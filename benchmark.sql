CREATE TABLE `test` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='测试表';

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'hello world', '2018-11-20 00:00:00', '2018-11-20 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);
