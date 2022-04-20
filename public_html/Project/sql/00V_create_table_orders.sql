#Create an Orders table (id, user_id, created, total_price, address, payment_method, money_received)

CREATE TABLE IF NOT EXISTS Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int NOT NULL,
    total_price FLOAT NOT NULL,
    address VARCHAR(200),
    payment_method VARCHAR(20) NOT NULL, 
    money_received int NOT NULL, 
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)
