<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 4/18/2022 4:56:52 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-2-shop-project/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161687044-051821e7-dda3-4a4d-8a45-5a8a8d1c5888.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Attached is the admin create item page <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161687098-08f0d8d0-2090-4c0e-aa02-37254c8fd710.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Attached is the admin create item page after the successfully adding of a<br>product<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161687155-af108d06-f401-4e12-a27a-30a2e06077f9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Attached is a product table along with all of them columns<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>In the admin folder, a new create_product.php page was added which has a<br>form element allowing for products to be added. The page is only accessible<br>by admins and will redirect the user with an error message if attempted<br>to be accessed by a user without an admin role. Once at the<br>page, the form allows admins to fill in the product name, category, stock,<br>unit price, visibility and description to create a new product. This is done<br>by using PDO and SQL to write an INSERT INTO query to insert<br>the product into the Products table. If done successfully, it will return a<br>success message.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/61">https://github.com/SahilBamb/IT202-010/pull/61</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/create_product.php">https://sb59-prod.herokuapp.com/Project/admin/create_product.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163528368-bd299831-4821-49f0-80b3-b627c8a1ec11.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows shop page without any filters<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163528547-57ad09f7-2756-4dee-98c9-532e2f5b3eab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows shop page with category filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163528531-44c478fe-4deb-4e6d-b004-7e87dd723135.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows shop page with search filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163528547-57ad09f7-2756-4dee-98c9-532e2f5b3eab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing page with sorting by unit_price<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163531363-ca13871e-8df0-4a66-8f50-933127adc5d9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing page with all filters and sorted by unit_price (additive filters)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code (ensure ucid and date is shown)</td></tr>
<tr><td><table><tr><td><img width="768px" src="Code Showing how the filter search process works on the shop page  "/></td></tr>
<tr><td> <em>Caption:</em> <p><img width="911" alt="image" src="https://user-images.githubusercontent.com/42818731/163773868-1f56f934-0432-4182-921f-874b03ccf12e.png"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>The table on the shop page is written using SQL and is done<br>by running a SQL query through PDO. This SQL query has a WHERE<br>clause that only shows products where visibility=1. This way, only products with true<br>visibility will be displayed. Additionally, the query limits the number of products by<br>stating LIMIT 10 at the end to only allow 10 rows to be<br>displayed. This query was made by concatenating strings together. This was done to<br>allow for additive filtering, which would allow additional AND WHERE statements to be<br>included for name search and category search. This was done using the name/category<br>LIKE %term% so that similar words or phrases containing the searched term could<br>be found. Also a ORDER BY unit_price is used to sort the products<br>by price if that option is selected. The actual filters are collected as<br>GET requests using a form and sanitized using the se function. The filters<br>can be cleared by entering empty fields or revisiting the page.</p><br><p>Placeholders, :sch and<br>:ctgry, are used in the query to substitute for the search name and<br>the search category and then the variables are binded to the prepared SQL<br>query using bindValue. Because the query uses a LIKE keyword that requires a<br>string the PARAM_STR is needed in the bindValue function. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/75">https://github.com/SahilBamb/IT202-010/pull/75</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/82">https://github.com/SahilBamb/IT202-010/pull/82</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/shop.php">https://sb59-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163597956-ca4e7007-ea5b-4efd-ade5-35306e330750.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows admin list items page that displays all products even those with<br>visibility 0<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>This was done by simply using a SQL and PDO to list all<br>products in the products page to a table. This is very similar to<br>the shop page with the major differences being it lists all the products,<br>shows product visibility (even when its zero), and that there is an edit<br>button that allows admin&#39;s to edit each product. It is also an admin<br>page that will bounce users to the home page if they do not<br>have the admin role.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/76">https://github.com/SahilBamb/IT202-010/pull/76</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/list_items.php">https://sb59-prod.herokuapp.com/Project/admin/list_items.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a sceenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163659561-863371a3-058e-451e-b2bf-df4ab3b5c72e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows edit button visible and working on the shop page (it is<br>hidden when a non-admins visits it)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a sceenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163659586-6afd3829-25c1-478e-8d3b-a02517da6a63.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows edit button visible and working on the product page (product details<br>page) (it is hidden when a non-admins visits it)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a sceenshot showing the edit button visible to the Admin on the Admin Product List Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163659618-93172bc2-99f0-4638-a748-56d6531bf7c9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows edit button visible and working on the admin product list page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163659791-022996dc-9404-4ca8-aaa5-4f859e1e1b2a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the before and after of editing a product using the<br>admin&#39;s edit product page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>This was accomplished by creating a product edit page that is only accessibly<br>by admins. This page is accessible from other products, so when a link<br>to edit is clicked, a GET request is populated with the product&#39;s id.<br>Then the page pulls from the database (using SQL and PDO through PHP)<br>all the relevant values from the database and populates the form with the<br>previous values. This allows the admin easier ability to edit them. When the<br>editing is completed, it can be submitted with a POST request that updates<br>all the values in the database. Adding this to each page with products<br>was done by simply adding in PHP statements checking if the user has<br>the admin role, if they do, it will add an edit button. <br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/75">https://github.com/SahilBamb/IT202-010/pull/75</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/product_edit.php?id=2">https://sb59-prod.herokuapp.com/Project/admin/product_edit.php?id=2</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163630503-1859d4f6-4e1c-4fc4-bc93-e1860d649529.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the link to the product page (product details) page from the<br>shop page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163630352-6afb700b-73dc-463a-8b72-93fdb3b40a05.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the product page (product details) page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>This was done by first checking if there was a get request, if<br>there was not, it would redirect the user to the home page with<br>the flash message that the product does not exist. If it does exist,<br>it would sanitize the input and check the database for a matching product.<br>If a matching product exists, it would fill in all the relevant fields<br>such as image, name, price, category producing the product page. Some additional fields<br>like rating, sale and new were added as well. If the product does<br>not exist or is not visible (after checking the database) the page would<br>simply tell the customer the product is not available. Also, the image will<br>load a placeholder image if there is no image url available in the<br>database.</p><br><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/78">https://github.com/SahilBamb/IT202-010/pull/78</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/product_page.php?id=12">https://sb59-prod.herokuapp.com/Project/product_page.php?id=12</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/product_page.php?id=8">https://sb59-prod.herokuapp.com/Project/product_page.php?id=8</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163705373-a8c5b2b7-082a-47c1-87f1-3b452a0788ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows success adding to the cart from the shop page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163757836-6a42893d-d2c5-4bcb-a9a6-fe9abb6abfbc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the success message of adding to cart (from Product Page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163705437-312de921-b654-4f8e-88b4-b97eb79232ee.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the error message of adding to cart while not logged in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td> <em>Response:</em> <p><img width="1058" alt="image" src="https://user-images.githubusercontent.com/42818731/163705380-c80b6071-044a-4c2b-98bb-b68b787344b3.png"><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>My cart works as 1 cart per user. The way add to cart<br>works is by having an associative cart table which has a composite primary<br>key made up of a userid from the USERS table and a itemid<br>from the PRODUCT table. It also has quantity as it allows users to<br>have multiple items of each type in their cart. <br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>Whenever users see a product, on the shop page or the product details<br>page, they are able to add it to the cart by clicking the<br>Add to Cart button on the page. This triggers a callback javascript function<br>of add_to_cart that sends a POST request with the item_id and quantity (which<br>is 1) to be added to their Cart table. On the server side<br>file of add_to_cart, the item_id, quantity and user_id are used to add a<br>row to the table (if the user_id and item_id do not exist). If<br>they do exist, it will simply update the value by adding to the<br>existing quantity. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/79">https://github.com/SahilBamb/IT202-010/pull/79</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View (show subtotal, total, and the link to Product Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758044-78fd14bf-679a-4949-8ebc-87b0eb690d29.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Cart View<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>The cart on the cart page first checks if the user is logs<br>in redirects the user to the login page with a flash message telling<br>them to login. If the are logged in, the actual table containing the<br>cart is displayed using a SQL query to Join the Product and Cart<br>tables where the user_id and item_id match. One additional column is retrieved as<br>the total of rounded unit_price*quantity (to 2 decimals). Finally, a table is prints<br>out using PHP for each statements and if then statements. This prints out<br>all the values of the SQL result which will be each product in<br>the cart and all relevant details along with its quantity, product page link<br>and its subtotal cost. There are some additional edits to certain columns made<br>like adding a dollar signs to the prices or a running sum variable<br>keeping track of the subtotal costs. These are done using if-then statements to<br>check the column that is being written. Finally the Edit Quantity column is<br>added along with + , - and Remove All buttons to each row<br>that allow editing each specific product&#39;s quantity by the user. The total cost<br>of the cart is tallied during this process and displayed along with a<br>Clear Cart button. The Remove All button removes all of a certain item<br>and the Clear Cart button clears the entire cart. </p><br><p>The update process for<br>a user editing their cart occurs through the + and - buttons located<br>on each row corresponding to each product that increase or decrease the quantity<br>in the cart. When clicked, they run a callback function called add_to_cart that<br>sends POST request to an add_to_cart.php server file with both the current quantity<br>and the iteration quantity. It checks if the iteration is negative or positive<br>and prepares a SQL query for each situation to update the value. In<br>the case the quantity of the product will be reduced to 0, it<br>will instead prepare a delete query that deletes the item from the table.<br>The Remove All button works in a very similar way except it sends<br>POST data to the clear_cart.php file and the SQL query is instead a<br>DELETE that deletes all values in the table where the user_id matches. </p><br><p>For<br>all of these operations, a flash message is displayed explaining the operation that<br>was completed followed by a refresh to the page to allow the quantity<br>value to update, the subtotal to update and the cart total to update.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/79">https://github.com/SahilBamb/IT202-010/pull/79</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/cart.php">https://sb59-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758044-78fd14bf-679a-4949-8ebc-87b0eb690d29.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before a Cart Quantity Update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758136-d2bdf29f-8182-4ca0-9f1c-911908f2f1e7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After a Cart Quantity Update of increasing the quantity of an item by<br>1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758482-3a71cd5f-c283-4092-9908-a75285c9481d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot immediately after the click changing quantity to 0 while the item is<br>being removed and flash message displayed<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758438-2fdd2b06-1fc1-477f-826e-e48cef26e1e0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after the subsequent refresh (seconds later) which removes the item entirely NOTE:<br>the screen refreshes itself<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758849-0fa5d48c-f07b-4f74-bfbf-f68ba4e0ec6e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Negative quantities are not handled as they are not allowed by the database,<br>attached is the SQL statement showing the constraint<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758438-2fdd2b06-1fc1-477f-826e-e48cef26e1e0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Also, the product dissapears from the cart after its quantity or stock falls<br>to 0 meaning that there is no way to iterate beyond 0 to<br>negative numbers. (Screenshot shows 0 quantity item dissapearing from cart) <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163768271-377098d2-3b02-4959-969a-2cae91d1e7bb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Flash message on Create Product page from PHP validation not allowing<br>negative Stock or Unit_Price to be inputted for a product (when min=0 form<br>attribute was removed)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163771358-89e54e7e-5df0-4287-a3ab-7b8faeb9cfa4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of HTML form attribute min=0 for Stock and Unit_Price on Edit Product<br>page not allowing for values lower than 0<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>Create Product and Edit Product avoids negative values in a number of ways.<br>On the lowest level, there are database constraints that do not allow negative<br>values to be stored for the stock and unit_price columns. Then on form<br>submission, there is server side PHP validation that checks if the values are<br>negative and does not run the database SQL query if they are. Finally,<br>the browser does not allow negative values to be inputted through the form<br>because of the min=0 attribute attached to the stock and unit_price forms. These<br>multiple layers of security do not allow negative values to be inputted. <br>The<br>update process for a user editing their cart occurs through the + and<br>- buttons located on each row corresponding to each product that increase or<br>decrease the quantity in the cart. When clicked, they run a callback function<br>called add_to_cart that sends postData to an add_to_cart.php server file with both the<br>current quantity and the iteration. It checks if the iteration is negative or<br>positive and prepares a SQL query for each situation, to update the new<br>value. In the case the quantity of the product will be reduced to<br>0, it will instead prepare a delete query that deletes the item from<br>the table. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/79">https://github.com/SahilBamb/IT202-010/pull/79</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163759496-6a1c7be8-24cf-4f37-8e7c-61eeb6d79d76.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots shows removing all of a single item from the cart (before removal)<br><br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163759539-a6c6aeab-dc34-41c3-8c6a-33bbc5ae6a16.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots shows removing all of a single item from the cart (during removal)<br><br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163759539-a6c6aeab-dc34-41c3-8c6a-33bbc5ae6a16.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots shows removing all of a single item from the cart (after removal)<br>when screen refreshes itself<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163759853-4b58d858-158e-43ae-af26-ddd2a02f3793.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot during cart clearing<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163759813-4b40454c-26b4-4c85-8125-7185ded46fd4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after cart clearing when screen refreshes itself<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>The delete process works firstly when the quantity in the cart is iterated<br>down to 0 using the - button. This is accounted for as a<br>negative -1 value is sent to the callback add_to_cart javascript function. This function<br>then sends this value through a POST request to the server side php<br>add_to_cart.php file. This has a check to see if the value is negative,<br>and then also checks if it will turn the item&#39;s quantity  in<br>the cart to 0. If it does, it will prepare a seperate SQL<br>query that deletes the row from the table where the user_id in the<br>$_SESSION variable match the user_id in the table and the item_id sent through<br>$_POST match the item_id in the table. than updating the quantity of it.<br>Once the placeholder values are filled in and binded with the correct variables<br>and the SQL query is ran, the function returns to the JavaScript function<br>which gives a flash message saying the item was removed and refreshes the<br>page to reflect the removal of the item from the page. The Remove<br>All button works in a very similar way except it sends POST data<br>to the clear_cart.php file and deletes all values in the table belonging to<br>the user. It does this using a SQL query to match all rows<br>in the Cart table where the user&#39;s id stored in the $_SESSION variable<br>matches the user_id in the table and the item_id matches the item_id. The<br>Clear Cart button simply deletes all rows where the user&#39;s id stored in<br>the $_SESSION variable matches the user_id in the table. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://github.com/SahilBamb/IT202-010/pull/79">https://github.com/SahilBamb/IT202-010/pull/79</a><br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163784047-d9e113eb-e3e2-4dde-b289-c2c140878582.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of proposal.md from Github.com<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163783893-3c30b1a4-5985-41b8-b0b5-1a67ed4ad872.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of proposal.md from Visual Studio Code<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163778270-da58d740-cecb-4e50-a11d-1c9bd8267042.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Project Board complete (Pt. 1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163778319-dbf0f88e-6659-45db-9086-95e161194629.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Project Board complete (Pt. 2)<br></p>
</td></tr>
<tr><td><img width="768px" src="Screenshot shows issues all closed"/></td></tr>
<tr><td> <em>Caption:</em> <p><img src="https://user-images.githubusercontent.com/42818731/163778181-c8dbb0d3-3cde-4cbc-b914-99e2644dc951.png" alt="image"><br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-2-shop-project/grade/sb59" target="_blank">Grading</a></td></tr></table>