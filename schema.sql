CREATE TABLE fiverr_clone_users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255) UNIQUE NOT NULL,
    password TEXT,
    user_role ENUM('Freelancer', 'Client', 'Admin') NOT NULL,
    display_picture TEXT,
    bio_description TEXT,
    contact_number VARCHAR(255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE proposals (
    proposal_id INT AUTO_INCREMENT PRIMARY KEY,
    proposer_id INT,
    category_id INT,
    subcategory_id INT,
    description TEXT,
    image TEXT,
    min_price INT,
    max_price INT,
    view_count INT DEFAULT 0,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (proposer_id) REFERENCES fiverr_clone_users(user_id)
);

CREATE TABLE offers (
    offer_id INT AUTO_INCREMENT PRIMARY KEY,
    offeror_id INT,
    description TEXT,
    proposal_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (offeror_id) REFERENCES fiverr_clone_users(user_id),
    FOREIGN KEY (proposal_id) REFERENCES proposals(proposal_id)
);

CREATE TABLE category (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(128) NOT NULL
);

CREATE TABLE subcategory (
    subcategory_id INT AUTO_INCREMENT PRIMARY KEY,
    parent_category_id INT NOT NULL,
    subcategory_name VARCHAR(128) NOT NULL,
    FOREIGN KEY (parent_category_id) REFERENCES category(category_id)
);