INSERT INTO application.event ( name, max_registration, timespan)
VALUES
  (
   "Halloween", 10, '["2019-10-31 00:00:00","2019-11-01 00:00:00"]'
  ),
   (
   "Noel", 5, '["2019-12-24 00:00:00","2019-12-25 00:00:00"]'
  );

INSERT INTO application.register ( event_id, lastname, firstname, email, phone)
VALUES
  (1, 'Doe', 'John', 'johndoe@test.local', '0600000001'),
  (1, 'Doe2', 'John2', 'johndoe2@test.local', '0600000002'),
  (1, 'Doe3', 'John3', 'johndoe3@test.local', '0600000003'),
  (1, 'Doe4', 'John4', 'johndoe4@test.local', '0600000004'),
  (1, 'Doe5', 'John5', 'johndoe5@test.local', '0600000005'),
  (2, 'Doe6', 'John6', 'johndoe6@test.local', '0600000006'),
  (2, 'Doe7', 'John7', 'johndoe7@test.local', '0600000007'),
  (2, 'Doe8', 'John8', 'johndoe8@test.local', '0600000008'),
  (2, 'Doe9', 'John9', 'johndoe9@test.local', '0600000009');
