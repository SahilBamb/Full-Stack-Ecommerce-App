<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 5/1/2022 9:50:49 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-3-shop-project/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to purchase their cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://user-images.githubusercontent.com/42818731/165011435-7c214b8e-9c3f-4be4-8d99-10c27b25c5cc.png">https://user-images.githubusercontent.com/42818731/165011435-7c214b8e-9c3f-4be4-8d99-10c27b25c5cc.png</a> </td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165011465-e0e29d8a-a098-409f-8576-9e62cf7c1b30.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>OrderItems table with valid data in it. This includes the order_id and item_id<br>as foreign keys from the Orders and Products table along with all other<br>relevant product data as a point-in-time capture of when the purchase happened. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164982263-935798d3-c50b-4532-be61-2762f871670e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the checkout page with items showing subtotal <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164200820-e2a4bd63-eedb-4423-8d4e-817f31d4f54e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the checkout page with items showing subtotal (zoomed in version)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the purchase validation code (ensure your ucid and date are included) (Payment method, purchase value, shipping info)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165012451-7aac2f07-13aa-4158-af4c-677a4da7e991.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout Form Validation (Pt. 1)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165015456-26421282-106e-4e36-a5cc-ab33b17b38f1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout Form Validation (Pt. 2)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165014899-9d035b1f-3b8c-484a-8aa9-6fb1092de962.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>ServerSide validation after database query verifying the payment, quantity and visibility with up-to-date<br>information<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165016322-85ef068a-2020-4d49-beed-3af77bc55298.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>ServerSide validation (before database query) verifying that first name, last name, payment methods,<br>address, country, state and zip code are not empty<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/166174860-8c0af299-c2f9-4868-9885-c77be38e6180.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>ServerSide Initial checkout validation code (before database query) verifying that all the fields<br>are formatted correctly<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the UI (Price check, Quantity/Stock check)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164982957-80ea7e25-b916-4aef-b052-c6dd27c58638.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout Form with Validation (Price)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164983038-fc3c9848-36d7-4c08-9431-9591e1000d79.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout Form with Form Validation (Shipping Address)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165152337-e3c01c06-58aa-44f7-bd4e-796a3ce1ab18.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout ServerSide Validation after submitting form (Price Change / Quantity Missing / Visibility<br>Changed) <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>The purchase process first starts after a logged in user views the shop<br>or product page where they are able to add products to the cart<br>using the &quot;Add to Cart&quot; button (the details of this process was previously<br>explained in Milestone 2). After the user has some items in their cart,<br>they are able to click the &#39;Checkout&#39; button in their Cart page that<br>takes them to a checkout page. The checkout page consists of a form<br>to fill out their shipping information as well as a mini-cart preview that<br>displays their cart contents, prices for each, quantity of each, subtotal of each<br>and a total price. The design of the page was done by making<br>changes to Bootstrap&#39;s checkout example template which is cited on the page and<br>available on their website. A SQL Query that SELECTs all the relevant product<br>information like name, unit_price, visibility, quantity in the Cart table JOIN-ed with the<br>Product table where the Cart table&#39;s item.id matches the Product table&#39;s id and<br>the user.id matches the logged in user&#39;s $_SESSION id. This will give us<br>an updated preview of the prices and quantities in the cart to be<br>used in making the mini-cart preview table (these prices, quantities and visibility will<br>be verified again during final checkout for any long-lasting carts). </p><br><p>Then actual checkout<br>form for billing information is made of the first name, last name, user,<br>email, address, address2, country, state, zip code, payment method and payment fields. Most<br>fields are done using the input type=&quot;text&quot; field besides the country and state<br>which are <select><option> fields. Finally the payment method are type=&quot;radio&quot; and the payment<br>is an input type=&quot;number&quot; with &quot;step=.01&quot;. Each contains some level of form validation<br>making sure that each field is completed and providing invalid-feedback messages if they<br>are not such as the payment field calculating the difference between submitted payment<br>and cart total and displaying it. ServerSide validation is done after submission where<br>the PHP code checks if the fields are all completed and not empty.<br>The more important checks are done by pulling the same SQL query as<br>before and rechecking the quantities, visibility and prices to make sure that all<br>products are available to buy and can still be afforded with the submitted<br>payment. Error flash messages are displayed corresponding to each of these individual errors<br>if any occur. </p><br><p>If all the validation passes, it will attempt to use<br>SQL to INSERT INTO the order into the Orders table which contains all<br>the order information such as shipping name, address, price, money received, and importantly<br>the id. Then, using lastInsertId() to draw the id of the order last<br>submitted, it runs through the products and submits each product (with the last<br>submitted orderID) into the OrderItems table connecting them to the order in the<br>Order&#39;s table using the orderID. At the same time, it will update the<br>stock in the Products page by decreasing it by the quantity the user<br>bought. This is done with a separate SQL query that uses UPDATE SET<br>stock = stock - quantity WHERE id=orderID. </p><br><p>If all three are completed successfully<br>a success message is posted saying the order was completed and the user<br>is redirected to the checkout confirmation/thank you page. There they get to see<br>a brief overview of their order and confirmation it has been completed. Here,<br>the cart is cleared using a JavaScript function in the same way that<br>it used to clear the cart on the Cart page, except a special<br>tag is used in the function to not refresh the page. </p><br><p>Of note,<br>all SQL queries are done using placeholders and binded to relevant variables. <br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/94">https://github.com/SahilBamb/IT202-010/pull/94</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/95">https://github.com/SahilBamb/IT202-010/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 8: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/cart.php">https://sb59-prod.herokuapp.com/Project/cart.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkout.php">https://sb59-prod.herokuapp.com/Project/checkout/checkout.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164983214-782981dd-aa4d-484a-851d-9f3dc7b9ec8d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Order Confirmation Page and Thank You Message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>While it is tempting to draw this information from the cart the same<br>way it was drawn in the cart and checkout page, this would be<br>incorrect. This is because this page is meant to confirm the order that<br>has been completed, or list the products that have been purchased. This means<br>we need a way to persist the completed order&#39;s id from the checkout<br>page to the checkout confirmation page. This is accomplished by storing the &#39;last<br>order purchased&#39; id in the $_SESSION variable and then accessing it and storing<br>it in a local variable before unsetting it in $_SESSION. With the order&#39;s<br>id, we can use it in a SQL query on the OrderItems table<br>JOIN-ed with the Products table. Running through the records allows us to list<br>every product that has been purchased in the previous order as well as<br>their purchased price. This is done through a Bootstrap table sequentially drawing each<br>row with the product name on the left and price on the right.<br>Additionally, another SQL query, a simple SELECT FROM Orders WHERE id=orderID, is run<br>on the Orders table to draw the details about the previous order such<br>as the payment method and payment received and list them as well. The<br>Order ID begins the table before each product, and the final two rows<br>of the table are the total, payment received and Payment method. </p><br><p>Finally there<br>is a thank you message thanking the customer for their purchase. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/96">https://github.com/SahilBamb/IT202-010/pull/96</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutConfirmPage.php">https://sb59-prod.herokuapp.com/Project/checkout/checkoutConfirmPage.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/cart.php">https://sb59-prod.herokuapp.com/Project/cart.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkout.php">https://sb59-prod.herokuapp.com/Project/checkout/checkout.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164983341-8ef5d8a0-6407-4428-a4d7-677ff781dfb1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This page shows all the purchase history of the user, clicking on each<br>underlined order # link takes them to the Order Details page of each<br>order<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165155296-7adcc0b0-fd1c-4854-9ec9-9ee4205ac9bd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing an individual order&#39;s (order #83) Order Detail&#39;s Page. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165019673-b0d0f542-681b-4982-be72-e4fa5a8325c0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows a user trying to access another user&#39;s Order Detail&#39;s Page and<br>being redirected from the page with an error message to their Order History<br>Page. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165157154-be1f313f-578d-4831-ad66-a6e076c9aa21.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Order History Page showing all the user&#39;s orders and basic information (Order #<br>is a link to see Order Details Page). <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>A user can access their order history from their Profile Page by clicking<br>the &quot;Order History&quot; button. When they arrive at the Order History page, it<br>will contain all of their orders in their own table which lists their<br>respective Order ID number, name on order, products purchased and quantities, subtotal, payment<br>received and payment method. This information is displayed in Bootstrap tables. It is<br>created row by row by using a SQL Query to SELECT all relevant<br>fields FROM the Orders table JOIN-ed with Users table where the userID in<br>the Orders table matches the id on the Users table and then WHERE<br>the user = the logged in user&#39;s id. This will pull all the<br>orders for the user. Next we can do a for each loop through<br>the results to get each orderID, money received, payment method and name. Still<br>in the for each loop, we will run a query for each order<br>where we will SELECT all fields FROM OrderItems JOIN-ed Products on item.id in<br>the OrderItems table = id in the Products table and WHERE order_id =<br>orderID. This queries results will give us a list of products included in<br>each order which we can then sequentially print out in our table. </p><br><p>As<br>mentioned this table starts with the order number and name in the first<br>row, before listing all the products and subtotals in each following row with<br>the final two rows being the payment method, payment totals and payment received.<br>The Order number and name are an <a> tag that allows the user<br>to go to the Order Details. This is the click that allows users<br>to visit the specific order&#39;s Order Details page which contains more information on<br>the order like date of creation and shipping address. </p><br><p>I also noticed that<br>the navigation was a little confusing within the Order History, Order Details page<br>so I included a breadcrumb navigation bar that allows for easier traversal through<br>the pages. Also of note, all the SQL Queries are done using placeholders<br>and then binding variables to them. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/100">https://github.com/SahilBamb/IT202-010/pull/100</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/96">https://github.com/SahilBamb/IT202-010/pull/96</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php">https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/orderHistory.php?id=70">https://sb59-prod.herokuapp.com/Project/checkout/orderHistory.php?id=70</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164983571-ac08e1c0-9c7e-4f7f-831b-0c2f5c328d68.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin order history showing all user&#39;s orders.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page) (from a user that's not the Store Owner)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/165155296-7adcc0b0-fd1c-4854-9ec9-9ee4205ac9bd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin order history showing a specific users order details<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>The Order Details page is very similar to the Order History page. The<br>main way it differs is that it uses a GET Request to persist<br>the order ID and get information about a specific order. It also differs<br>in that it allows the user to view a specific order rather than<br>using their user_ID to draw all their orders and presents a little more<br>information like the shipping address. Just like in the Order History page, it<br>is formatted as a Bootstrap table with Order ID number, name on order,<br>products purchased and quantities, subtotal, payment received and payment method. But this time<br>adding in shipping address information. </p><br><p>First, we make sure &#39;id&#39; is set in<br>$_GET. If it is not, we redirect the user to their Order History<br>page with a message to select an order. If it is set, we<br>store it in the Order ID variable. </p><br><p>Next, we do the same thing<br>as the Order History page by pulling all the user&#39;s orders because we<br>need to do some validation checking to make sure this OrderID actually belongs<br>to the user. We do this using a SQL Query to SELECT all<br>relevant fields FROM the Orders table JOIN-ed with Users table where the userID<br>in the Orders table matches the id on the Users table and then<br>WHERE the user = the logged in user&#39;s id. This will pull all<br>the orders for the user. Again, while we do not need all the<br>order IDs to display this one order, we do this to make sure<br>that the order being requested in the GET Request actually belongs to the<br>user. We can check this by running through the retrieved Order IDs and<br>making sure that one of them matches the requested orderID. If it does<br>not belong to the user, or the orderID does not exist, they are<br>redirected to their Order History page saying they can only view their own<br>orders. </p><br><p>Once we have confirmed the order belongs to them, we actually display<br>the order information. We retrieve the information by running a SQL Query to<br>SELECT all fields FROM OrderItems table JOIN-ed to the Products table on item.id<br>in the OrderItems table = id in the Products table and WHERE order_id<br>= orderID. We format this Bootstrap table with a special row on top<br>for the shipping address information. The following rows are the same as the<br>Order History tables with the product information and subtotals in each row. The<br>final two rows are the order total, payment method and payment received. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/100">https://github.com/SahilBamb/IT202-010/pull/100</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/109">https://github.com/SahilBamb/IT202-010/pull/109</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/orderHistory.php?id=70">https://sb59-prod.herokuapp.com/Project/checkout/orderHistory.php?id=70</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php">https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164983938-2f267a4d-4822-4b5b-8a3d-dad262be6527.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Proposal.md with checked off boxes for each task completed in Visual Studio Code<br>Prod Branch<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164984037-239cfe3a-a729-4f49-a5d7-1c2a15754690.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Proposal.md with checked off boxes for each task completed in Github Prod Branch<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164984128-a44b0810-2b4b-4f48-a389-8fabafa4c9b7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board Screenshot showing Done Issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164984146-f18bc540-b2b0-4e9b-b68d-1bfe70c6d9ab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board Screenshot showing Done Issues (Pt. 2 scrolled down)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/164984161-22599469-2b64-44a6-84da-5572caa39d9f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board Screenshot showing Done Issues (Pt. 3 scrolled down)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-3-shop-project/grade/sb59" target="_blank">Grading</a></td></tr></table>
