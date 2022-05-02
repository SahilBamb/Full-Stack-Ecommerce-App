-- Create table called Ratings (id, product_id, user_id, rating, comment, created, modified)
-- 1-5 rating
-- Text Comment (use TEXT data type in sql)
-- Must be done on the Product Details Page
-- Ratings and Rating Comments will be visible on the Product Details page
-- Show the latest 10 reviews
-- Paginate anything beyond 10
-- Show the average rating on the Product Details Page

-- (id, product_id, user_id, rating, comment, created, modified)

CREATE TABLE IF NOT EXISTS Ratings(
    id int AUTO_INCREMENT PRIMARY KEY,
    product_id int, 
    user_id int, 
    rating int NOT NULL,
    comment VARCHAR(100),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(id),
    FOREIGN KEY (user_id) REFERENCES Users(id),
    CHECK (rating>=0 AND rating<=5)
)
