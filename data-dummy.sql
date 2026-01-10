-- Dummy User -> Password : admin
INSERT INTO
    `users` (`name`, `username`, `password`,)
VALUES
    (
        'Administrator',
        'admin',
        '$2y$10$tphlQGsube2Gm1WRAtyV4exVwdcJxKw4Yj/samuui5VsOfht6bGNK',
    );
    -- Dummy Categories
INSERT INTO
    `categories` (`category_name`)
VALUES
    ('Laptop'),
    ('Monitor'),
    ('Keyboard'),
    ('Mouse'),
    ('Headset');
    -- Dummy Products
INSERT INTO
    products (
        product_name,
        product_description,
        product_code,
        price,
        stock,
        category_id,
        status
    )
VALUES
    -- Laptop (1)
    (
        'Laptop ASUS VivoBook 14',
        'Laptop 14 inch Intel Core i5, RAM 8GB, SSD 512GB',
        'LTP-ASUS-VB14',
        8500000,
        10,
        1,
        TRUE
    ),
    (
        'Laptop Lenovo IdeaPad 3',
        'Laptop harian AMD Ryzen 5, RAM 8GB, SSD 256GB',
        'LTP-LNV-IP3',
        7800000,
        8,
        1,
        TRUE
    ),
    -- Monitor (2)
    (
        'Monitor LG 24 Inch',
        'Monitor Full HD IPS 75Hz',
        'MON-LG-24',
        2300000,
        15,
        2,
        TRUE
    ),
    (
        'Monitor Samsung 27 Inch',
        'Monitor Curved Full HD 144Hz',
        'MON-SMG-27',
        3500000,
        6,
        2,
        TRUE
    ),
    -- Keyboard (3)
    (
        'Keyboard Mechanical Red Switch',
        'Keyboard mechanical RGB dengan red switch',
        'KBD-MECH-RD',
        550000,
        20,
        3,
        TRUE
    ),
    (
        'Keyboard Wireless Logitech',
        'Keyboard wireless slim untuk kerja kantor',
        'KBD-LGT-WL',
        450000,
        12,
        3,
        TRUE
    ),
    -- Mouse (4)
    (
        'Mouse Logitech G102',
        'Mouse gaming RGB 8000 DPI',
        'MSE-LGT-G102',
        320000,
        25,
        4,
        TRUE
    ),
    (
        'Mouse Wireless Xiaomi',
        'Mouse wireless silent click',
        'MSE-XMI-WL',
        180000,
        30,
        4,
        TRUE
    ),
    -- Headset (5)
    (
        'Headset Logitech G331',
        'Headset gaming stereo dengan mic noise cancelling',
        'HDS-LGT-G331',
        650000,
        14,
        5,
        TRUE
    ),
    (
        'Headset HyperX Cloud Stinger',
        'Headset gaming ringan dengan bass kuat',
        'HDS-HYP-STG',
        720000,
        9,
        5,
        TRUE
    ),
    (
        'Headset Sony WH-1000XM4',
        'Headset wireless noise cancelling premium',
        'HDS-SNY-XM4',
        4200000,
        5,
        5,
        TRUE
    );