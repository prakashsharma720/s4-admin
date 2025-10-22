<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-10-20 12:06:54 --> Could not find the language line "back"
ERROR - 2025-10-20 12:06:55 --> Query error: Unknown column 'notifications.lead_id' in 'on clause' - Invalid query: SELECT `notifications`.*, `emp1`.`name` as `creator`, `emp1`.`photo` as `creator_photo`, `emp2`.`name` as `employee`, `emp2`.`photo` as `employee_photo`, `lead_csv`.`lead_code`
FROM `notifications`
LEFT JOIN `employees` as `emp1` ON `notifications`.`created_by` = `emp1`.`id`
LEFT JOIN `employees` as `emp2` ON `notifications`.`employee_id` = `emp2`.`id`
LEFT JOIN `lead_csv` ON `notifications`.`lead_id` = `lead_csv`.`id`
ORDER BY `notifications`.`id` DESC
ERROR - 2025-10-20 12:12:10 --> Could not find the language line "back"
ERROR - 2025-10-20 12:12:11 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:11 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:11 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:11 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:11 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:11 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:39 --> Could not find the language line "back"
ERROR - 2025-10-20 12:12:39 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:39 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:39 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:39 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:39 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:39 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> Could not find the language line "back"
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 12:12:43 --> Query error: Table 'saral_erp.products' doesn't exist - Invalid query: SELECT *
FROM `products`
WHERE `id` IS NULL
ERROR - 2025-10-20 12:12:45 --> Could not find the language line "back"
ERROR - 2025-10-20 12:12:50 --> Query error: Table 'saral_erp.to_do_activities' doesn't exist - Invalid query: SELECT `t`.*, `e`.`name` as `employee_name`
FROM `to_do_activities` `t`
LEFT JOIN `employees` `e` ON `e`.`id` = `t`.`assigned_to`
ORDER BY `t`.`id` DESC
ERROR - 2025-10-20 12:12:52 --> Could not find the language line "back"
ERROR - 2025-10-20 12:12:59 --> Query error: Table 'saral_erp.quotation_table' doesn't exist - Invalid query: SELECT `lead_csv`.*, `employees`.`name` as `employee_name`, `quotation_table`.`estimate_no`, `quotation_table`.`id` as `quotation_id`
FROM `lead_csv`
LEFT JOIN `employees` ON `lead_csv`.`lead_assign`=`employees`.`id`
LEFT JOIN `quotation_table` ON `lead_csv`.`id`=`quotation_table`.`lead_id`
ORDER BY `lead_csv`.`id` DESC
ERROR - 2025-10-20 12:13:02 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 12:13:05 --> Could not find the language line "office_time_in"
ERROR - 2025-10-20 12:13:05 --> Could not find the language line "office_time_out"
ERROR - 2025-10-20 12:13:05 --> Could not find the language line "leave"
ERROR - 2025-10-20 12:13:05 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:05 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:06 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:06 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:06 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:06 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:06 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:06 --> Could not find the language line "total_net_salary"
ERROR - 2025-10-20 12:13:10 --> Could not find the language line "add_employee"
ERROR - 2025-10-20 12:13:13 --> Severity: Warning --> Undefined variable $totalemployees C:\xampp\htdocs\CI\saral-erp-mgt\application\views\payroll\attandace_calculation.php 109
ERROR - 2025-10-20 12:13:13 --> Could not find the language line "add_employee"
ERROR - 2025-10-20 12:13:46 --> Query error: Table 'saral_erp.products' doesn't exist - Invalid query: SELECT *
FROM `products`
WHERE `id` IS NULL
ERROR - 2025-10-20 12:13:48 --> Severity: Warning --> Undefined variable $totalemployees C:\xampp\htdocs\CI\saral-erp-mgt\application\views\payroll\attandace_calculation.php 109
ERROR - 2025-10-20 12:13:48 --> Could not find the language line "add_employee"
ERROR - 2025-10-20 12:20:34 --> Could not find the language line "category_name"
ERROR - 2025-10-20 12:24:03 --> Could not find the language line "category_name"
ERROR - 2025-10-20 13:11:40 --> Could not find the language line "back"
ERROR - 2025-10-20 13:11:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 13:11:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 13:11:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 13:11:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 13:11:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 13:11:40 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 13:11:50 --> 404 Page Not Found: Products/index
ERROR - 2025-10-20 13:11:53 --> 404 Page Not Found: Product/index
ERROR - 2025-10-20 13:12:09 --> 404 Page Not Found: Products/index
ERROR - 2025-10-20 13:12:13 --> 404 Page Not Found: Products/index
ERROR - 2025-10-20 13:17:34 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:18:16 --> Severity: error --> Exception: syntax error, unexpected token "}" C:\xampp\htdocs\CI\saral-erp-mgt\application\controllers\Products.php 17
ERROR - 2025-10-20 13:18:21 --> Severity: Warning --> Undefined property: Products::$template C:\xampp\htdocs\CI\saral-erp-mgt\application\controllers\Products.php 16
ERROR - 2025-10-20 13:18:21 --> Severity: error --> Exception: Call to a member function load() on null C:\xampp\htdocs\CI\saral-erp-mgt\application\controllers\Products.php 16
ERROR - 2025-10-20 13:18:42 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:18:47 --> 404 Page Not Found: O/index
ERROR - 2025-10-20 13:18:57 --> 404 Page Not Found: O/index
ERROR - 2025-10-20 13:19:00 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:19:01 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:19:04 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:19:36 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:21:44 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:21:45 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 13:24:00 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:22:16 --> Could not find the language line "back"
ERROR - 2025-10-20 14:22:16 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 14:22:16 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 14:22:16 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 14:22:16 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 14:22:16 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 14:22:16 --> 404 Page Not Found: User_authentication/assets
ERROR - 2025-10-20 14:22:19 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:22:22 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:24:33 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:25:59 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:28:36 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:28:37 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:31:56 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:31:56 --> Severity: Warning --> Undefined variable $id C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 77
ERROR - 2025-10-20 14:31:56 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 85
ERROR - 2025-10-20 14:31:56 --> Severity: Warning --> Undefined variable $category_name C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 85
ERROR - 2025-10-20 14:32:34 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:32:34 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 89
ERROR - 2025-10-20 14:32:34 --> Severity: Warning --> Undefined variable $category_name C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 89
ERROR - 2025-10-20 14:34:11 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:34:11 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 89
ERROR - 2025-10-20 14:34:11 --> Severity: Warning --> Undefined variable $category_name C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 89
ERROR - 2025-10-20 14:34:11 --> Severity: Warning --> Undefined variable $contact_person C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 97
ERROR - 2025-10-20 14:34:20 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:34:20 --> Severity: Warning --> Undefined variable $contact_person C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 97
ERROR - 2025-10-20 14:34:35 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
ERROR - 2025-10-20 14:34:35 --> Severity: Warning --> Undefined variable $contact_person C:\xampp\htdocs\CI\saral-erp-mgt\application\views\products\add.php 97
ERROR - 2025-10-20 14:34:49 --> Severity: Warning --> Undefined variable $categories C:\xampp\htdocs\CI\saral-erp-mgt\application\views\Lead_Module\Lead_Generation\component\filter-model.php 28
