INSERT INTO `civilitees` (`id`, `civilite`) VALUES
(1, 'Mr'),
(2, 'Mme');



INSERT INTO `employees` (`id`, `employee_number`, `civilite_id`, `name`, `last_name`, `language_id`, `cellphone`, `user_id`, `email`, `position_id`, `location_id`, `extra_infos`, `formation_plan_last_sent`, `active`, `created`, `modified`) VALUES
(1, '4455', 1, 'Jean', 'Francois', 1, 50, NULL, 'JeanFrancois@bongocatsoft.ca', 1, 1, NULL, '2018-03-16 16:17:00', 0, '2019-10-01 22:58:08', '2019-10-02 19:10:11'),
(2, '85', 2, 'Michael', 'Dagenais', 1, NULL, NULL, 'MichaelDagenais@bongocatsoft.ca', 2, 1, NULL, '2014-11-22 21:21:00', 1, '2019-10-02 02:43:16', '2019-10-02 02:43:16');

INSERT INTO `formations_employee` (`id`, `employee_id`, `formation_id`, `date_executee`, `proof_id`) VALUES
(1, 1, 1, '2019-10-01', NULL);

INSERT INTO `formations_position` (`id`, `position_id`, `formation_id`, `proof_id`, `status_formation`) VALUES
(1, 1, 4, NULL, 'R');


INSERT INTO `locations` (`id`, `address`, `province`, `postal_code`) VALUES
(1, '1040 rue de l\'avenir, Laval', 'QC', 'I4K 3G4'),
(2, '475 Boulevard de l\'Avenir, Laval', 'QC', 'H7N 5H9');

INSERT INTO `positions` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Programmeur', '2019-10-01 22:52:17', '2019-10-01 22:52:17'),
(2, 'Testeur', '2019-10-01 22:52:21', '2019-10-01 22:52:21');

INSERT INTO `users` (`id`, `email`, `password`, `name`, `last_name`, `employee_id`, `created`, `modified`, `role`) VALUES
(3, 'Yanick@bongocatsoft.ca', '$2y$10$sAARY0FMFAuXkt0d5nmzQ.UDM6SdiF0qV.t10LTeP3vY9UP34uYhK', 'Yanick', 'Valiquette', NULL, '2019-09-30 20:08:32', '2019-09-30 20:08:32', 0),
(4, 'David@bongocatsoft.ca', '$2y$10$ILw5ybHw1xe5jynnQFEzAOYtP7wjrcDEySX8KHAw2Iyd8uO7V1oU.', 'David', 'Ringuet', NULL, '2019-09-30 20:09:37', '2019-09-30 20:09:37', 0),
(5, 'Pascal@bongocatsoft.ca', '$2y$10$Di3hH8Is3P0tq1gKaEhu9OuNClhjFWoMPRsGilJJdIspQOs/E/fwe', 'Pascal', 'Raymond', NULL, '2019-09-30 20:13:00', '2019-09-30 20:13:00', 0),
(6, 'admin@bongocatsoft.ca', '$2y$10$7poq5YbcE7MV6GQ616gOPOai/vpi71N.L1btn/DI0FoTPDqlDsJym', 'admin', 'admin', NULL, '2019-10-01 01:44:05', '2019-10-01 01:57:11', 1);

INSERT INTO `languages` (`id`, `langue`) VALUES
(1, 'Français'),
(2, 'Anglais');

INSERT INTO `frequences` (`id`, `title`) VALUES
(NULL, 'A l\'embauche\r\n')
, (NULL, 'Au 1 an\r\n'),
 (NULL, 'Aux 2 ans\r\n'),
 (NULL, 'Aux 3 ans\r\n'),
 (NULL, 'Aux 5 ans\r\n');

