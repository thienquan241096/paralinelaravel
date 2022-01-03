$(() => {

    $(document).on('change', '.form__file-control', (event) => {
      const targetThumb = $(`label[for="${event.target.id}"]`).find('.form__file-thumb')
  
      if (event.target.files && event.target.files[0]) {
        const reader = new FileReader()
  
        reader.onload = (e) => {
          targetThumb.attr('src', e.target.result)
        }
  
        reader.readAsDataURL(event.target.files[0])
      }
    });

    $("#title").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#slug").val(Text);
    });
  
    $(document).on('change', '.form__check-all', (event) => {
        $('.form__check-all-target').prop('checked', event.target.checked)
    });

    $('.delete_all').on('click', function(e) {
        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0) {
            toastr.error('Please select row to delete');
        } else {  
            Swal.fire({
                    title: 'Do you want to delete？',
                    // showDenyButton: true,
                    showCancelButton: true,
                    denyButtonText: `Don't delete`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        var join_selected_values = allVals.join(","); 
                        var url = $(this).data('url');
                        var params = 'ids='+join_selected_values;
                        ajaxDeleteRecords(url, params)
                    }
                })
        }
    });
})


//common delete Records
function ajaxDeleteRecords(url, params ) {
    $.ajax({
        url: url,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: params,
        success: function (data) {
            if (data['success']) {
                $(".sub_chk:checked").each(function() {  
                    $(this).parents("tr").remove();
                });
                toastr.success('Delete Successful');
            } else {
                toastr.error('Delete Fail');
            }
        },
        error: function (data) {
            toastr.error('Delete Fail');
        }
    });
    $.each(allVals, function( index, value ) {
        $('table tr').filter("[data-row-id='" + value + "']").remove();
    });
}

function ajaxReloadList(url, params ) {
    $.ajax({
        url:url,
        type: 'GET',
        data: {'params': params},
        success:function(data) {
            $('#input').html(data);
        }
    });
}


//search ajax customer
$('#search').on('keyup',function(){
    var value = $(this).val();
    var url = $(this).attr('data-url');
    searchData(url, value);
});

//common search 
function searchData(url, search){
    $.ajax({
                url: url,
                type: "GET",
                data: {
                    search
                },
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
          })
          .done(function(data) {
              if(data.html == " "){
                  $('.ajax-load').html("No more records found");
                  return;
              }
              $('.ajax-load').hide();
              $("#search-data tr").remove();
              $("#search-data").append(data.html);
          })
          .fail(function(jqXHR, ajaxOptions, thrownError) {
                toastr.error('server not responding...');
          });
  }

//search ajax industry
$('.select-country').on('change',function(){
    var value = $(this).val();
    var url = $(this).attr('data-url');
    var type = $(this).attr('data-type');
    console.log({type})
    changeIndustry(type, url, value);
});

function changeIndustry(type, url , value) {
    $.ajax({
        url: url,
        type: "GET",
        data: {
            value,
            type
        },
        beforeSend: function()
        {
            $('.ajax-load').show();
        }
    })
    .done(function(data) {
        if(data.html == " "){
            $('.ajax-load').html("No more records found");
            return;
        }

        if(type == "country") {
            $(".industry-show option").remove();
            $(".industry-show").append(data.htmlIndustry);
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
            toastr.error('server not responding...');
    });
}

  //search ajax select
$('.select-option').on('change',function(){
    var value = $(this).val();
    var url = $(this).attr('data-url');
    var type = $(this).attr('data-type');
    changeSearch(type, url, value);
});

function changeSearch(type, url , value) {
    $.ajax({
        url: url,
        type: "GET",
        data: {
            value,
            type
        },
        beforeSend: function()
        {
            $('.ajax-load').show();
        }
    })
    .done(function(data) {
        if(data.html == " "){
            $('.ajax-load').html("No more records found");
            return;
        }

        if(type == "job_function") {
            $(".job-title-show option").remove();
            $(".job-title-show").append(data.html);
        }
        if(type == "country") {
            $(".state-show option").remove();
            $(".state-show").append(data.htmlState);
            changeSearch('state', url, data.firstStateId);
        }
        if(type == "state") {
            $(".city-show option").remove();
            $(".city-show").append(data.htmlCities);
        }
        
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
            toastr.error('server not responding...');
    });
}

//search ajax detail data
$('#searchDetail').on('keyup',function(){
    var value = $(this).val();
    var code = $(this).attr('data-code');
    var url = $(this).attr('data-url');
    searchData(url, value, code);
});

//common search 
function searchData(url, search, code){
    $.ajax({
                url: url,
                type: "GET",
                data: {
                    search,
                    code
                },
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
          })
          .done(function(data) {
              if(data.html == " "){
                  $('.ajax-load').html("No more records found");
                  return;
              }
              $('.ajax-load').hide();
              $("#search-data tr").remove();
              $("#search-data").append(data.html);
          })
          .fail(function(jqXHR, ajaxOptions, thrownError) {
                toastr.error('server not responding...');
          });
  }
