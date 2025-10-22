-- Create Coloum for Lead_csv table -- Priority

ALTER TABLE lead_csv ADD leads_priority VARCHAR(255) NOT NULL AFTER lead_status;
-- 03-09-2025
CREATE TABLE lead_schedule_activities ( id INT AUTO_INCREMENT PRIMARY KEY, lead_id INT NOT NULL, activity_type VARCHAR(100) NOT NULL, due_date DATE NOT NULL, assign_to INT NOT NULL, activity_summary TEXT, document_file VARCHAR(255) DEFAULT NULL, other_text VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (lead_id) REFERENCES lead_csv(id) ON DELETE CASCADE );

-- 03-09-2025

ALTER TABLE `lead_csv` ADD `lead_architect` VARCHAR(255) NULL AFTER `lead_source`, ADD `lead_assign` INT(11) NULL AFTER `lead_architect`, ADD `project_address` VARCHAR(255) NULL AFTER `lead_assign`, ADD `region_selection` VARCHAR(50) NULL AFTER `project_address`, ADD `lead_site_file` VARCHAR(255) NULL AFTER `region_selection`;


-- 10-09-2025 Rahul

ALTER TABLE `employees` ADD `employee_description` VARCHAR(255) NULL AFTER `address`;
ALTER TABLE `employees` ADD `office_time_in` TIME NULL AFTER `employee_description`;
ALTER TABLE `employees` ADD `office_time_out` TIME NULL AFTER `office_time_in`;
ALTER TABLE `employees` ADD `leave` VARCHAR(255) NULL AFTER `office_time_in`;


-- 09-09-2025

ALTER TABLE `lead_schedule_activities` ADD COLUMN `activity_feedback` TEXT NULL AFTER `activity_summary`, ADD COLUMN `feedback_created_at` DATETIME NULL AFTER `activity_feedback`;


-- 10-09-2025 by Deepak

ALTER TABLE `lead_csv` CHANGE `date` `date` DATE NULL;

ALTER TABLE `lead_csv` CHANGE `country` `country` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `lead_csv` CHANGE `city` `city` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `lead_csv` ADD `firm_name` VARCHAR(255) NULL AFTER `lead_architect`;

ALTER TABLE `lead_csv` ADD `current_location` VARCHAR(255) NULL AFTER `city`;

-- 13-09-2025 by Deepak Sharma

ALTER TABLE `lead_csv` ADD `mediator_mobile_no` VARCHAR(255) NULL AFTER `firm_name`, ADD `mediator_address` VARCHAR(255) NULL AFTER `mediator_mobile_no`;





--04-10-2025 by Rahul Sharma 

ALTER TABLE employees 
ADD COLUMN email_verified TINYINT(1) NOT NULL DEFAULT 0 AFTER pf,
ADD COLUMN mobile_verified TINYINT(1) NOT NULL DEFAULT 0 AFTER email_verified;



-- 23-09-2025 by Deepak Sharma

ALTER TABLE `lead_csv` ADD `state` TEXT NULL AFTER `city`;

ALTER TABLE `lead_csv` ADD `map_link` VARCHAR(255) NULL AFTER `state`;
ALTER TABLE `lead_csv` ADD `convert_quotation` TINYINT(4) NOT NULL AFTER `date`;

ALTER TABLE `notifications` ADD `lead_id` INT(6) NOT NULL AFTER `leave_id`;

ALTER TABLE `quotation_table` ADD `updated_at` DATETIME NULL AFTER `created_by`, ADD `updated_by` INT(11) NULL AFTER `updated_at`;




-- 04-10-2025 by Deepak Sharma

ALTER TABLE `lead_schedule_activities` ADD COLUMN `activity_rating` INT(1) DEFAULT NULL AFTER `activity_feedback`;

CREATE TABLE `to_do_activities` ( `id` INT(11) NOT NULL AUTO_INCREMENT, `title` VARCHAR(255) NULL, `to_do_description` TEXT NULL, `assigned_to` INT(11) NOT NULL, `due_date` DATETIME DEFAULT NULL, `status` ENUM('Pending','In Progress','Completed') DEFAULT 'Pending', `created_by` INT(11) NOT NULL, `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`) );

ALTER TABLE `to_do_activities` ADD `to_do_feedback` TEXT NULL AFTER `due_date`;

ALTER TABLE employees ADD COLUMN eligible_esi_pf TINYINT(1) DEFAULT 0;

ALTER TABLE `lead_quotation_items` CHANGE `product` `product_id` INT(11) NOT NULL, CHANGE `hsn_code` `hsn_code` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL, CHANGE `unit` `unit` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;


