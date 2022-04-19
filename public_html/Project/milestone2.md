<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 4/18/2022 11:44:49 PM</td></tr>
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
<tr><td> <em>Response:</em> <p>In the admin folder, a new create_product.php page was added which has a<br>form element allowing for products to be added. The page is only accessible<br>by admins and will redirect the user with an error message if attempted<br>to be accessed by a user without an admin role. Once at the<br>page, the form allows admins to fill in the product name, category, stock,<br>unit price, visibility and description to create a new product. Many of these<br>fields like name, category, stock and unit_price are required which is enforced by<br>the form attributes and by PHP server side validation. The validation occurs when<br>the form is submitted which populates the $_POST variable. PHP will check the<br>values for correctness and, if they fail, will display a flash message explaining<br>what must be fixed along with not allowing the data to be bound<br>to a SQL query and submitted into the Products table. If it passes<br>all validation, a query to INSERT INTO Products is prepared with placeholders instead<br>of values. Values are bound to the these placeholders and the query is<br>executed. The resulting success or failure message is communicated through a flash message<br>to the user. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/61">https://github.com/SahilBamb/IT202-010/pull/61</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/create_product.php">https://sb59-prod.herokuapp.com/Project/admin/create_product.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163902114-975ec817-9803-4355-b2a5-a01ce27f6609.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows Shop Page displaying 10 items without any filters<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163903800-5ab13430-41e9-419f-ab9e-69bac8e75272.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop Page after Searching Category for Term (Filter)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163903717-c958148e-01eb-412a-aefe-fa24cd9e9c4c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop Page after Searching Name for Term (Filter)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163903883-144f1e06-72f9-40af-8312-09e10df54b34.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop Page sorted by Unit_Price<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163904047-5eae6b4f-057e-49f9-a984-18128ac28475.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing Page with Sorting by unit_price and searching by Category and Term (Additive<br>Filter)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code (ensure ucid and date is shown)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163908838-68142690-a9de-4b5b-a283-f0f164da9ba1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing Code used to do Filtering with comments  <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>The original table on the Shop Page displaying 10 products uses a SQL<br>Query, through PDO, that retrieves product data from the Products table in the<br>database. This query SELECTS all the columns from Products WHERE visibility=1 and ORDER<br>BY modified LIMIT 10. Each part of this query is put together by<br>appending strings together. This allows for the abilityto change the query as needed.<br>For example, if the user is an admin, it will omit the visibility=1<br>and allow all products to be viewed. </p><br><p>Now to explain filtering, after the<br>form is submitted and populates the $_GET variable, it will create new parts<br>of the query. For example, if the search field is populated, it will<br>add AND name LIKE :sch and append it to the query and if<br>the category field is populated it will add AND category LIKE :ctgry. These<br>placeholder values will have the appropriate variable values bound to them (retrieved from<br>the $_GET variable). Finally, if the form checks the Sort By Price option<br>and fills the $_GET variable, it will change the ORDER BY modified to<br>ORDER BY unit_price instead. </p><br><p>Finally, functionality was added to clear the filters by<br>submitting empty fields to the form. This works by looking for empty values<br>inside of $_GET and unsetting the respective values.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/75">https://github.com/SahilBamb/IT202-010/pull/75</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/82">https://github.com/SahilBamb/IT202-010/pull/82</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/shop.php">https://sb59-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163905155-6e37a5d6-5694-4ed7-a546-98481b89c291.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows admin list items page that displays all products even those with<br>visibility 0 and edit buttons<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>The List_Items Page or Admin Product List Page was created using a SQL<br>query through PDO to retrieve data from the Products table in the database.<br>The way this works is that a query SELECTS all the product values<br>including visibility FROM the Products table. Then a PHP statements perform a foreach<br>loop that runs through each record. On the 0th record, it will first<br>print out the names of each column. It then prints out each column<br>value for the record using another for each loop. This is how it<br>prints out the table through php statements and the table HTML element. </p><br><p>This<br>is very similar to the shop page with the major differences being it<br>lists all the products, shows product visibility (even when its zero) and item_id,<br>and that there is an edit button that allows admin&#39;s to edit each<br>product. It is also an admin page that will bounce users to the<br>home page if they do not have the admin role.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/76">https://github.com/SahilBamb/IT202-010/pull/76</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/list_items.php">https://sb59-prod.herokuapp.com/Project/admin/list_items.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a sceenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163905359-2ee96b7e-1301-4efa-b322-8c34ca94444c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows Edit Button visible and working on the Shop Page (it is<br>hidden when a non-admins visits it)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a sceenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163659586-6afd3829-25c1-478e-8d3b-a02517da6a63.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows Edit Button visible and working on the Product Page (Product Details<br>Page) (it is hidden when a non-admins visits it)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a sceenshot showing the edit button visible to the Admin on the Admin Product List Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163905155-6e37a5d6-5694-4ed7-a546-98481b89c291.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows edit button visible and working on the admin product list page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163659791-022996dc-9404-4ca8-aaa5-4f859e1e1b2a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the before and after of editing a product using the<br>admin&#39;s edit product page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>When a user with an admin role is viewing them, edit buttons are<br>added in-line with each product in the tables on the Shop Page and<br>List Items Page. This was done through a PHP if statement within the<br>table checking if the user is an admin and adding in an additional<br>column header to edit the product, a long with edit links on each<br>row. The link fields of these <a> tags were filled with a link<br>to the Product_Edit Page with the item id sent as a get request<br>through the url (product_edit.php?id=). Once they arrive on the page, if the user<br>is not an admin or the product does not exist it will bounce<br>them from the page to the homepage with an error message. </p><br><p>With the<br>Edit Product Page only being accessible from specific products, either in rows or<br>on product pages, it will always have a populated $_GET populated with the<br>product&#39;s id. So the Edit Product&#39;s Page pulls from the database (using SQL<br>and PDO through PHP) all the relevant values from the database and populates<br>the form with the previous values. This allows the admin easier ability to<br>edit them. When the editing is completed, it can be submitted with a<br>POST request. There is validation for each value within the HTML form as<br>well as server side through PHP, and if it passes all these steps,<br>it is prepared through placeholders into an SQL query. This is an UPDATE<br>products SET that updates the row that matches the item_id.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/75">https://github.com/SahilBamb/IT202-010/pull/75</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/product_edit.php?id=2">https://sb59-prod.herokuapp.com/Project/admin/product_edit.php?id=2</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163905751-1dc62266-6154-4c71-878c-0d466045089c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the link to the Product Page (Product Details) page from the<br>Shop Page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163905838-0953d5db-a24a-4426-90b0-4ca59f4ecf8f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the link to the Product Page (Product Details) page from the<br>Cart Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163906087-73b74aa0-a5d9-4b22-b179-ac1f035a2ed3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the Product Page (Product Details) Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>Instead of having different Product / Product Detail Pages for each product, a<br>bettter method is to have one template page that can be filled in<br>with relevant information for each product. This is done by receiving the item_id<br>through a $_GET and using it to search the database for a matching<br>product. In the code, this is done through a check if $_GET[&quot;id&quot;] is<br>set, and if it is not, bouncing the user from the page with<br>a flash message saying that no valid product is selected. If the $_GET<br>Variable is approprately filled out with a item_id, a database SQL query will<br>be prepared using SELECT all the item columns FROM products where visibility=1 and<br>id=:iid. This is a placeholder that will be bound to the $_GET variables<br>id value before the query is run. If the SQL query returns a<br>result with a count($results) of 0, a message of product does not exist<br>is displayed. </p><br><p>If it is completed successfully and all the data about the<br>item is retrieved, it is displayed using a two column Bootstrap container showing<br>the product image on the right and the relevant information the right such<br>as name, category, stock, description and price. There is also an Add to<br>Cart button that allows the user to add the item to their cart.<br>Some additional fields like rating, sale and new were added as well and<br>the image will load a placeholder image if there is no image url<br>is available in the database.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/78">https://github.com/SahilBamb/IT202-010/pull/78</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/product_page.php?id=12">https://sb59-prod.herokuapp.com/Project/product_page.php?id=12</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/product_page.php?id=8">https://sb59-prod.herokuapp.com/Project/product_page.php?id=8</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163705373-a8c5b2b7-082a-47c1-87f1-3b452a0788ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows success adding to the cart from the Shop Page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163757836-6a42893d-d2c5-4bcb-a9a6-fe9abb6abfbc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the success message of adding to cart (from Product / Product<br>Details Page)<br></p>
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
<tr><td> <em>Response:</em> <p>Whenever users see a product, on the Shop Page or the Product /<br>Product Details Page, they are able to add it to the cart by<br>clicking the Add to Cart button on the page. This triggers a callback<br>javascript function of add_to_cart that sends a POST request with the item_id and<br>quantity (which is 1) to be added to their Cart table to an<br>add_to_cart.php file. On the server side file of add_to_cart.php, the item_id, quantity and<br>user_id are used to add a row to the table (if the user_id<br>and item_id do not exist in the table already). If they do exist,<br>it will simply update the value by adding to the existing quantity. </p><br><p>Within<br>the Cart Page, the update process for a user editing their cart occurs<br>through the + and - buttons located on each row corresponding to each<br>product that increase or decrease the quantity in the cart. When clicked, they<br>run a callback function called add_to_cart that sends POST request to an add_to_cart.php<br>file with both the current quantity and the iteration quantity. It checks if<br>the iteration is negative or positive and prepares an UPDATE SQL query for<br>each situation to either increase or decrease the quantity value of the item<br>in the cart. In the case the quantity of the product will be<br>reduced to 0, it will instead prepare a delete SQL query that deletes<br>the item from the table. The Remove All button works in a very<br>similar way except it uses a clear_cart JavaScript callback function and sends POST<br>data to the clear_cart.php file and the SQL query is instead a DELETE<br>that deletes all records in the table where the item_id and user_id matches.<br>Finally the Clear Cart button works using the same clear_cart JavaScript function, but<br>sends an empty item_id which tells clear_cart.php file to instead delete all rows<br>in the Cart table where the user_id match, regardless of item_id. </p><br><p>For all<br>of these operations, a flash message is displayed explaining the operation that was<br>completed followed by a refresh to the page to allow the item&#39;s quantity<br>value to update, the subtotal to update and the Total Cost to update.<br><br></p><br></td></tr>
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
<tr><td> <em>Response:</em> <p>The cart on the Cart Page first checks if the user is logged<br>in. If they are not, it redirects the user to the login page<br>with a flash message telling them to login. If they are logged in,<br>the actual table containing the cart is displayed using a SQL query to<br>Join the Product and Cart tables where the user_id and item_id match. One<br>additional column is retrieved as the total of rounded unit_price*quantity (to 2 decimals).<br>Finally, a table is prints out using PHP for each statements and if<br>then statements. This, using PHP for-each statements and the HTML table element, prints<br>out all the values of the SQL result which will be each product<br>in the cart and all relevant details along with its quantity, product page<br>link and its subtotal cost. There are some additional edits to certain columns<br>made like adding a dollar signs to the prices or a running sum<br>variable keeping track of the subtotal costs. These are done using if-then statements<br>to check the column that is being written. Finally the Edit Quantity column<br>is added along with + , - and Remove All buttons to each<br>row that allow editing each specific product&#39;s quantity by the user. The total<br>cost of the cart is tallied during this process and displayed along with<br>a Clear Cart button. The Remove All button removes all of a certain<br>item and the Clear Cart button clears the entire cart. </p><br><p>So the subtotal<br>is calculated by the SQL query by asking for ROUND(unit_price*quantity) as a column<br>in the $results and the Total Cost is calculated by having a running<br>sum $totalCost variable add the subtotals of each product in $results when creating<br>the table.  <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/79">https://github.com/SahilBamb/IT202-010/pull/79</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/cart.php">https://sb59-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163906702-47973e0a-2104-48dc-987c-668d6601fac4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cart Page before a cart quantity update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163758136-d2bdf29f-8182-4ca0-9f1c-911908f2f1e7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cart Page after a cart quantity update increasing the quantity of an item<br>by 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163906861-a731ba3a-5c8b-48dd-8aae-ae4d749b17ad.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cart Page after a cart quantity update increasing the quantity of an item<br>by 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163906919-27a92388-d19d-49d4-9d84-fd09950d0ad9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Cart Page after a cart quantity update decreasing the quantity of an item<br>by 1<br></p>
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
<tr><td> <em>Response:</em> <p>Create Product and Edit Product avoid negative values in a number of ways.<br>On the lowest level, there are database constraints that do not allow negative<br>values to be stored for the stock and unit_price columns. Then on form<br>submission, there is server side PHP validation that checks if the values are<br>negative and does not run the database SQL query if they are. Finally,<br>the browser does not allow negative values to be inputted through the form<br>because of the min=0 attribute attached to the stock and unit_price forms. These<br>multiple layers of security do not allow negative values to be inputted. <br>The<br>update process for a user editing their cart occurs through the + and<br>- buttons located on each row corresponding to each product that increase or<br>decrease the quantity in the cart. When clicked, they run a callback function<br>called add_to_cart that sends postData to an add_to_cart.php server file with both the<br>current quantity and the iteration. It checks if the iteration is negative or<br>positive and prepares a SQL query for each situation, to update the new<br>value. In the case the quantity of the product will be reduced to<br>0, it will instead prepare a delete query that deletes the item from<br>the table entirely. <br>This means that users cannot cause negative values as they<br>can only iterate quantity in their cart down by 1, and when they<br>reach one the value will be deleted from their cart. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/79">https://github.com/SahilBamb/IT202-010/pull/79</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163907490-5d671a89-ca51-408e-9062-5d98b911576a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots shows removing all of a single item from the cart (before removal)<br><br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163907650-f2a6c152-faaa-4edd-a93e-09c24642a69a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots shows removing all of a single item from the cart (during removal)<br><br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/163907680-35e258c6-08ad-4e58-b271-d5992ded392e.png"/></td></tr>
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
<tr><td> <em>Response:</em> <p>The delete process works firstly when the quantity in the cart is iterated<br>down to 0 using the - button. This is accounted for as a<br>negative -1 value is sent to the callback add_to_cart javascript function. This function<br>then sends this value through a POST request to the server side php<br>add_to_cart.php file. This has a check to see if the value is negative,<br>and then also checks if it will turn the item&#39;s quantity  in<br>the cart to 0. If it does, it will prepare a seperate SQL<br>query that deletes the row from the table where the user_id in the<br>$_SESSION variable match the user_id in the table and the item_id sent through<br>$_POST match the item_id in the table. Once the placeholder values are filled<br>in and bound with the correct variables and the SQL query is ran,<br>the function returns to the JavaScript function which gives a flash message saying<br>the item was removed and refreshes the page to reflect the removal of<br>the item from the page. The Remove All button works in a very<br>similar way except it sends POST data to the clear_cart.php file and deletes<br>all values in the table belonging to the user. It does this using<br>a SQL query to match all rows in the Cart table where the<br>user&#39;s id stored in the $_SESSION variable matches the user_id in the table<br>and the item_id matches the item_id. The Clear Cart button simply deletes all<br>rows where the user&#39;s id stored in the $_SESSION variable matches the user_id<br>in the table. <br>Ultimately each of these deletes are done in the same<br>way: as SQL queries through PDO where they DELETE from CART WHERE and<br>either delete all rows matching the item_id and user_id or just the user_id.<br><br></p><br></td></tr>
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