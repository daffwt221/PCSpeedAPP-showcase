CREATE TABLE customers (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(120) NOT NULL,
    email VARCHAR(160),
    phone VARCHAR(40),
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_customers_name (name)
);

CREATE TABLE repair_orders (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    reference VARCHAR(24) NOT NULL UNIQUE,
    customer_id INTEGER NOT NULL,
    equipment_type VARCHAR(80) NOT NULL,
    brand VARCHAR(80),
    model VARCHAR(100),
    serial_number VARCHAR(120),
    reported_issue TEXT NOT NULL,
    technician_notes TEXT,
    status ENUM(
        'received',
        'diagnosis',
        'awaiting_approval',
        'repairing',
        'ready',
        'delivered',
        'cancelled'
    ) NOT NULL DEFAULT 'received',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_repair_orders_customer
        FOREIGN KEY (customer_id) REFERENCES customers(id),
    INDEX idx_repair_orders_customer (customer_id),
    INDEX idx_repair_orders_status (status),
    INDEX idx_repair_orders_updated (updated_at)
);
