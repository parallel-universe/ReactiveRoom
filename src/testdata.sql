INSERT INTO `player` (`id`, `created`, `updated`, `username`, `email`, `password`, `terminalId`)
VALUES
    ('6hKWplv05zVGyCp', NULL, NULL, 'player1', 'matt@basekit.com', NULL, 'AdewfWfweF');

INSERT INTO `terminal` (`id`, `created`, `updated`, `name`, `ipAddress`, `networkId`)
VALUES
    ('AdewfWfweF', NULL, '2016-07-15 01:09:15', 'terminal', '192.168.0.67', 'TtwFWew');

INSERT INTO `software` (`id`, `created`, `updated`, `name`, `type`, `level`)
VALUES
    ('FWfweFwefwFWG', NULL, '2016-07-15 01:07:43', 'password cracker', 'executable', 1);

INSERT INTO `network` (`id`, `created`, `updated`, `name`)
VALUES
    ('TtwFWew', NULL, NULL, 'home network');

INSERT INTO `hardware` (`id`, `created`, `updated`, `name`, `type`, `level`)
VALUES
    ('htrwffwWfw', NULL, '2016-07-15 01:08:26', 'cpu', 'core', 1);

INSERT INTO `hardware` (`id`, `created`, `updated`, `name`, `type`, `level`)
VALUES
    ('fthygjuhghfvj', NULL, '2016-07-15 01:08:26', 'ram', '1GB', 1);

INSERT INTO `terminal_to_software_map` (`id`, `terminalId`, `softwareId`)
VALUES
    ('dRFUTYGJUK', 'AdewfWfweF', 'FWfweFwefwFWG');

INSERT INTO `terminal_to_hardware_map` (`id`, `terminalId`, `hardwareId`)
VALUES
    ('dRFUTYGJUK', 'AdewfWfweF', 'htrwffwWfw');

INSERT INTO `terminal_to_hardware_map` (`id`, `terminalId`, `hardwareId`)
VALUES
    ('SRHFJGTdhKJH', 'AdewfWfweF', 'fthygjuhghfvj');
