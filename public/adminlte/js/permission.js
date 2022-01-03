
    $('.check_permission_all').click(function () {    
        $('.check_permission').prop('checked', true);
    });

    $('.deselect_permission_all').click(function () {    
        $('.check_permission').prop('checked', false);
    });

    function checkBoxPermission(event, permissionClass) {
        if($(event).is(':checked')) {
            $(`.${permissionClass}`).prop('checked', true);
        } else {
            $(`.${permissionClass}`).prop('checked', false);
        }
    }

    function checkBoxPermissionChild(event, permissionClass, permissionCurrent) {
        var count = 0;
        var countPermission = $(`.${permissionClass}-2`).length;
        if($(`.${permissionCurrent}`).is(':checked')) {
            $(`.${permissionCurrent}`).prop('checked', true);
            $(`.${permissionClass}-2:checked`).each(function(index) {
                if(this) {
                    count += 1;
                }
            });
        } else {
            $(`.${permissionCurrent}`).prop('checked', false);
            $(`.${permissionClass}-1`).prop('checked', false);
        }
        if(countPermission === count) {
            $(`.${permissionClass}-1`).prop('checked', true);
        }
    }
