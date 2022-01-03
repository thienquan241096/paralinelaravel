<?php
namespace App\Constant;

class PermissionConstant
{
    /** User permission */
    const USER_PERMISSION_LIST   = "list-users";
    const USER_PERMISSION_EDIT   = "edit-users";
    const USER_PERMISSION_CREATE = "create-users";
    const USER_PERMISSION_VIEW   = "view-users";
    const USER_PERMISSION_DELETE = "delete-users";

    /** Role permission */
    const ROLE_PERMISSION_LIST   = "list-roles";
    const ROLE_PERMISSION_EDIT   = "edit-roles";
    const ROLE_PERMISSION_CREATE = "create-roles";
    const ROLE_PERMISSION_VIEW   = "view-roles";
    const ROLE_PERMISSION_DELETE = "delete-roles";


    /** Customer permission */
    const CUSTOMER_PERMISSION_LIST   = "list-customers";
    const CUSTOMER_PERMISSION_EDIT   = "edit-customers";
    const CUSTOMER_PERMISSION_CREATE = "create-customers";
    const CUSTOMER_PERMISSION_VIEW   = "view-customers";
    const CUSTOMER_PERMISSION_DELETE = "delete-customers";

    /** Datas permission */
    const DATA_PERMISSION_LIST   = "list-datas";
    const DATA_PERMISSION_EDIT   = "edit-datas";
    const DATA_PERMISSION_CREATE = "create-datas";
    const DATA_PERMISSION_VIEW   = "view-datas";
    const DATA_PERMISSION_DELETE = "delete-datas";
    const DATA_PERMISSION_IMPORT = "import-datas";

    /** Plans permission */
    const PLAN_PERMISSION_LIST   = "list-plans";
    const PLAN_PERMISSION_EDIT   = "edit-plans";
    const PLAN_PERMISSION_CREATE = "create-plans";
    const PLAN_PERMISSION_VIEW   = "view-plans";
    const PLAN_PERMISSION_DELETE = "delete-plans";

    /** Contact permission */
    const CONTACT_PERMISSION_LIST   = "list-contacts";
    const CONTACT_PERMISSION_EDIT   = "edit-contacts";
    const CONTACT_PERMISSION_CREATE = "create-contacts";
    const CONTACT_PERMISSION_VIEW   = "view-contacts";
    const CONTACT_PERMISSION_DELETE = "delete-contacts";

    /** question_answer permission */
    const QUESTION_ANSWER_PERMISSION_LIST   = "list-question-answer";
    const QUESTION_ANSWER_PERMISSION_EDIT   = "edit-question-answer";
    const QUESTION_ANSWER_PERMISSION_CREATE = "create-question-answer";
    const QUESTION_ANSWER_PERMISSION_VIEW   = "view-question-answer";
    const QUESTION_ANSWER_PERMISSION_DELETE = "delete-question-answer";

    /** Information permission */
    const INFORMATION_PERMISSION_LIST   = "list-informations";
    const INFORMATION_PERMISSION_EDIT   = "edit-informations";
    const INFORMATION_PERMISSION_CREATE = "create-informations";
    const INFORMATION_PERMISSION_VIEW   = "view-informations";
    const INFORMATION_PERMISSION_DELETE = "delete-informations";

    /** terms of use   permission */
    const TERM_OF_USE_PERMISSION_LIST   = "list-term-of-use";
    const TERM_OF_USE_PERMISSION_EDIT   = "edit-term-of-use";
    const TERM_OF_USE_PERMISSION_CREATE = "create-term-of-use";
    const TERM_OF_USE_PERMISSION_VIEW   = "view-term-of-use";
    const TERM_OF_USE_PERMISSION_DELETE = "delete-term-of-use";

     /** privacy policy permission */
     const PRIVACY_POLICY_PERMISSION_LIST   = "list-privacy-policies";
     const PRIVACY_POLICY_PERMISSION_EDIT   = "edit-privacy-policies";
     const PRIVACY_POLICY_PERMISSION_CREATE = "create-privacy-policies";
     const PRIVACY_POLICY_PERMISSION_VIEW   = "view-privacy-policies";
     const PRIVACY_POLICY_PERMISSION_DELETE = "delete-privacy-policies";

     /** Country data permission */
     const COUNTRY_PERMISSION_LIST   = "list-countries";
     const COUNTRY_PERMISSION_EDIT   = "edit-countries";
     const COUNTRY_PERMISSION_CREATE = "create-countries";
     const COUNTRY_PERMISSION_VIEW   = "view-countries";
     const COUNTRY_PERMISSION_DELETE = "delete-countries";

     /** job function permission */
     const JOB_FUNCTION_PERMISSION_LIST   = "list-job-functions";
     const JOB_FUNCTION_PERMISSION_EDIT   = "edit-job-functions";
     const JOB_FUNCTION_PERMISSION_CREATE = "create-job-functions";
     const JOB_FUNCTION_PERMISSION_VIEW   = "view-job-functions";
     const JOB_FUNCTION_PERMISSION_DELETE = "delete-job-functions";

     /** job title permission */
     const JOB_TITLE_PERMISSION_LIST   = "list-job-titles";
     const JOB_TITLE_PERMISSION_EDIT   = "edit-job-titles";
     const JOB_TITLE_PERMISSION_CREATE = "create-job-titles";
     const JOB_TITLE_PERMISSION_VIEW   = "view-job-titles";
     const JOB_TITLE_PERMISSION_DELETE = "delete-job-titles";

     /** state permission */
     const STATE_PERMISSION_LIST   = "list-states";
     const STATE_PERMISSION_EDIT   = "edit-states";
     const STATE_PERMISSION_CREATE = "create-states";
     const STATE_PERMISSION_VIEW   = "view-states";
     const STATE_PERMISSION_DELETE = "delete-states";

     /** city permission */
     const CITY_PERMISSION_LIST   = "list-cities";
     const CITY_PERMISSION_EDIT   = "edit-cities";
     const CITY_PERMISSION_CREATE = "create-cities";
     const CITY_PERMISSION_VIEW   = "view-cities";
     const CITY_PERMISSION_DELETE = "delete-cities";

     /** company permission */
     const COMPANY_PERMISSION_LIST   = "list-companies";
     const COMPANY_PERMISSION_EDIT   = "edit-companies";
     const COMPANY_PERMISSION_CREATE = "create-companies";
     const COMPANY_PERMISSION_VIEW   = "view-companies";
     const COMPANY_PERMISSION_DELETE = "delete-companies";

     /** industry permission */
     const INDUSTRY_PERMISSION_LIST   = "list-industries";
     const INDUSTRY_PERMISSION_EDIT   = "edit-industries";
     const INDUSTRY_PERMISSION_CREATE = "create-industries";
     const INDUSTRY_PERMISSION_VIEW   = "view-industries";
     const INDUSTRY_PERMISSION_DELETE = "delete-industries";

     /** order permission */
     const ORDER_PERMISSION_LIST   = "list-orders";
     const ORDER_PERMISSION_EDIT   = "edit-orders";
     const ORDER_PERMISSION_CREATE = "create-orders";
     const ORDER_PERMISSION_VIEW   = "view-orders";
     const ORDER_PERMISSION_DELETE = "delete-orders";

     /** order history permission */
     const ORDER_HISTORY_PERMISSION_LIST   = "list-order-histories";
     const ORDER_HISTORY_PERMISSION_EDIT   = "edit-order-histories";
     const ORDER_HISTORY_PERMISSION_CREATE = "create-order-histories";
     const ORDER_HISTORY_PERMISSION_VIEW   = "view-order-histories";
     const ORDER_HISTORY_PERMISSION_DELETE = "delete-order-histories";

     /** setting permission */
     const SETTING_PERMISSION_LIST   = "list-settings";
     const SETTING_PERMISSION_EDIT   = "edit-settings";
     const SETTING_PERMISSION_CREATE = "create-settings";
     const SETTING_PERMISSION_VIEW   = "view-settings";
     const SETTING_PERMISSION_DELETE = "delete-settings";

     /** report permission */
     const REPORT_PERMISSION_LIST   = "list-reports";
     const REPORT_PERMISSION_EDIT   = "edit-reports";
     const REPORT_PERMISSION_CREATE = "create-reports";
     const REPORT_PERMISSION_VIEW   = "view-reports";
     const REPORT_PERMISSION_DELETE = "delete-reports";

     /** permission permission */
     const PERMISSION_PERMISSION_LIST   = "list-permissions";
     const PERMISSION_PERMISSION_EDIT   = "edit-permissions";
     const PERMISSION_PERMISSION_CREATE = "create-permissions";
     const PERMISSION_PERMISSION_VIEW   = "view-permissions";
     const PERMISSION_PERMISSION_DELETE = "delete-permissions";

     /** user credit permission */
     const USER_CREDIT_PERMISSION_LIST   = "list-user-credits";
     const USER_CREDIT_PERMISSION_EDIT   = "edit-user-credits";
     const USER_CREDIT_PERMISSION_CREATE = "create-user-credits";
     const USER_CREDIT_PERMISSION_VIEW   = "view-user-credits";
     const USER_CREDIT_PERMISSION_DELETE = "delete-user-credits";
     /** Customer Data permission */
     const CUSTOMER_DATA_PERMISSION_LIST   = "list-customer-data";
     const CUSTOMER_DATA_PERMISSION_EDIT   = "edit-customer-data";
     const CUSTOMER_DATA_PERMISSION_CREATE = "create-customer-data";
     const CUSTOMER_DATA_PERMISSION_VIEW   = "view-customer-data";
     const CUSTOMER_DATA_PERMISSION_DELETE = "delete-customer-data";

      /** Customer Description Data List */
      const CUSTOMER_DESCRIPTION_DATA_PERMISSION_LIST   = "list-customer-description-data";
      const CUSTOMER_DESCRIPTION_DATA_PERMISSION_EDIT   = "edit-customer-description-data";
      const CUSTOMER_DESCRIPTION_DATA_PERMISSION_CREATE = "create-customer-description-data";
      const CUSTOMER_DESCRIPTION_DATA_PERMISSION_VIEW   = "view-customer-description-data";
      const CUSTOMER_DESCRIPTION_DATA_PERMISSION_DELETE = "delete-customer-description-data";
    
    

 
}