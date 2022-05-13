<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 5/12/2022 11:11:12 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-4-shop-project/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone4 branch </li>
<li>Create a new markdown file called milestone4.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone4.md link (from Milestone4) into the proposal.md file under each milestone4 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone4.md</li>
<li>Add/commit/push the changes to Milestone4</li>
<li>PR Milestone4 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes</li>
<li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167559760-829c30ba-a2fa-4e52-a5f5-5d6694ed9114.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the full users table as well as the new privacy<br>column. There is also a new image column for adding user profile pictures.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167559614-5c38de1a-e79d-426b-8f59-93fc57653132.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the profile view when a user tries to edit their<br>own profile. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167557094-dcbd1ee3-8c2e-4047-a6ce-dfb38a8207c8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the public profile view when viewed by other users. It<br>can also be viewed by the user themselves through get request. (this user<br>reviewed the same product multiple times). <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167557598-38813426-e2fd-499b-b9b9-f0c1b413de85.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user trying to access a non-public user&#39;s profile page<br>and being redirected back to their own profile with a flash message letting<br>them know they cannot access it. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/121">https://github.com/SahilBamb/IT202-010/pull/121</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/123">https://github.com/SahilBamb/IT202-010/pull/123</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/134">https://github.com/SahilBamb/IT202-010/pull/134</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/profile.php?id=26">https://sb59-prod.herokuapp.com/Project/profile.php?id=26</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/profile.php?id=27">https://sb59-prod.herokuapp.com/Project/profile.php?id=27</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>From the user experience view of the site the profile privacy status applies<br>to other user&#39;s profile and to user&#39;s product reviews. If a user has<br>their profile set to private, the navigating user will not be able to<br>see the private user&#39;s profile and all of their reviews will be listed<br>as by &quot;anonymous&quot; instead of the user&#39;s real username. The way this is<br>implemented is by first adding a column to the User&#39;s table called Privacy<br>of type tinyint(1). A value of 1 means the profile is public and<br>a value of 0 means the profile is private. Users accessing their own<br>profile will do so by going to profile.php without having any &#39;id&#39; value<br>set in their GET request. If their profile.php url includes &#39;profile.php?id=2&#39; where 2<br>is any customer number then it will try to access the user&#39;s public<br>page. If the user does not exist or the user&#39;s privacy is set<br>to private, it will redirect them from the page. </p><br><p>On the page this<br>is implemented first by using the $_GET to acquire the desired user_id number<br>to be used in our SQL query. After performing our SQL query request<br>on the database and pulling all the requested user&#39;s data we will first<br>check if the privacy value is set to 1 or 0. If the<br>value is set to 0 then the user trying to access the page<br>will be redirected to their own profile page with an error flash message<br>letting them know that the profile they requested is private. This solution prevents<br>users getting locked out of their own profiles as they will always be<br>able to access &#39;profile.php&#39; with no GET request and even be redirected there<br>when visiting a private user&#39;s profile. </p><br><p>They can change their Privacy status on<br>their profile page through radio buttons within the form. This works the same<br>way as the other values of the POST profile form like username, email<br>and password. This is by doing some validation checking to make sure the<br>value is either 0 and 1 and then updating the value in the<br>database through a UPDATE SQL request. </p><br><p>Finally reviews of private users are private<br>simply by checking the Privacy value of a user whenever their reviews are<br>written and hiding the username if they are. This happens on multiple places<br>around the site wherever reviews are available. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167561900-17bbc141-8854-4289-8f18-709fad5e3fbb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the ratings table with data in it. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167562691-94946d11-c2b7-4f3c-bc88-80f7e49ac317.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Product details page with Customer Review section with pagination. It also has expandable/dropdown<br>Rate Order button that allows users to click and then leave a comment<br>and rating. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167563345-8c81fe76-1eaa-467e-aa36-3fbb4b87721a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Order history page where users are able to rate their products from previous<br>orders. This seems like a natural place to rate orders as there is<br>a guarantee the user has previously purchased them (it still checks). <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167563026-a541376a-ec42-4ea4-8584-ec1dfadbd774.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of a user&#39;s attempt at rating product without purchasing and the subsequent<br>error message.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/124">https://github.com/SahilBamb/IT202-010/pull/124</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/125">https://github.com/SahilBamb/IT202-010/pull/125</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/122">https://github.com/SahilBamb/IT202-010/pull/122</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/123">https://github.com/SahilBamb/IT202-010/pull/123</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/product_page.php?id=11">https://sb59-prod.herokuapp.com/Project/product_page.php?id=11</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <p>The UI of the comment rating is implemented as a Bootstrap dropdown that<br>expands when clicked on to present a POST form with five radio buttons<br>for each rating number and a text input for the comment. After it<br>submits it populates the $_POST variable which we detect by checking if variables<br>isset($_POST[&#39;variableName&#39;]). </p><br><p>If they are, we can add the review to the database using<br>a SQL Query that INSERTS into the Ratings table with the product_id, user_id,<br>rating and comment. The product_id and user_id are foreign keys from the user_id<br>and product_id tables, they both are taken from the $_GET of the page<br>the user is on, and the user_id is taken from the logged in<br>user&#39;s $_SESSION variable. The rating is collected from the $_POST from the rating<br>form along with the comment. </p><br><p>Some serverside validation that we do is checking<br>if the rating falls into the appropriate range of 0 to 5, making<br>sure the comment is not longer than 250 characters also using regex to<br>check if the comment contains only numbers or letters. This is done by<br>setting $hasError to False and then doing successive checks and setting $hasError to<br>True if it fails any of them. Then we will only prepare and<br>execute the SQL query on the database if $hasError is False. </p><br><p>This will<br>be discussed more in-depth further down in another answer, but additionally the AVGRating<br>field in the Product table will be updated for the row with a<br>matching product_id. </p><br><p>These reviews/ratings are displayed as individual comments and 0-5 star ratings<br>on different places throughout the site from the Product Page to the Profile<br>Page to the Shop Page. This is done by doing a SELECT rating<br>FROM Ratings JOIN-ed with Users on user_id WHERE . The WHERE clause changes<br>on if we are looking for a user&#39;s reviews for their Profile Page<br>or a product reviews for the Product Page. In the case of the<br>Product Page and Shop page we pull the AVGRating from the Products table<br>to display alongside the item. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167564412-11ff9994-0765-482b-8a5e-b361376b1f89.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the Order History Page with a category filter<br>as well as pagination shown at the bottom of the page.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167565101-33e05f69-1b7c-4d9d-bd58-5c7fb8613eb8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing date range filters on Order History Page.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/129">https://github.com/SahilBamb/IT202-010/pull/129</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/136">https://github.com/SahilBamb/IT202-010/pull/136</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php">https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php?category=&startDate=2022-03-01&endDate=2022-05-30&SortByPrice=1">https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php?category=&startDate=2022-03-01&endDate=2022-05-30&SortByPrice=1</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167744749-e24b6bea-f4b6-4c10-9cd0-69ba373ad1fb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows multiple filters applied and the total price is being calculated for<br>multiple pages worth of orders (not just the first page)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167745858-037efa64-e1dd-47e4-91ad-8abeb7e015b6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot one category filter applied and the total price is being calculated. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167746303-771ca472-70b9-4e11-9a85-2ec81eb19fdb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows a date range filter with total price being calculated for multiple<br>pages (10 orders per page). <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/129">https://github.com/SahilBamb/IT202-010/pull/129</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/136">https://github.com/SahilBamb/IT202-010/pull/136</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php">https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>If we use a filter, like a searching for a date range, on<br>the admin Order History page it will be accepted through a GET request<br>in the $_GET variable on the submission of the form. Now at the<br>beginning of the page we check if the $_GET[&#39;startDate&#39;] and $_GET[&#39;endDate&#39;] variables are<br>set and if they are we use placeholders and the BETWEEN keyword to<br>add to the end of the SQL query. So &#39;AND c.created BETWEEN :startDate<br>AND :endDate&#39;. The sort by price works in a very similar way, checking<br>for the $_GET[&quot;SortByTotalPrice&quot;] variable being set and then adding &quot;ORDER BY total_price&quot; to<br>the end of the query. </p><br><p>The category filter is applied very differently due<br>to the nature of it. The way it works is that it selects<br>orders with at least one product in the selected category. The way this<br>is implemented is by doing the SELECT FROM OrderItems JOIN Products WHERE the<br>product_id from OrderItmes = id from Product. This query will select all orders<br>that match the other filters, then before printing out the actual table we<br>do a check. This check entails looping through each order to see if<br>they have at least one product in the relevant category and setting a<br>flag variable, $categoryMatch, to TRUE. Then each order&#39;s table will only print out<br>if the $categoryMatch variable is true. </p><br><p>While this works, this unfortunately causes troubles<br>with the other date filter as well as the pagination of the page.<br>For this reason, both of these features had to be worked into this<br>system.  The date was implemented in a similar way, by checking if<br>each order is within the date range and only printing it out if<br>it did. Why we need to do that will become apparent shortly (pagination).<br></p><br><p>Our previous pagination implementation was based off of page number, items_per_page and using<br>that to define the parameters of the LIMIT keyword so for example: LIMIT<br>:offset, :per_page. In order to find the cart totals and calculate them appropriately,<br>we need every order that is found under the filter, so this was<br>removed and simply returns all values matched. Now with our $results coming from<br>the database pull holding all orders, we must define how many orders go<br>on each page below. Setting this to 10 we must set a counter<br>for how many orders pass the requirement for the filters that we mentioned<br>previously: category match and/or date match. If their index is between (page-1) x<br>10 to (page x 10) they are allowed to print out. This is<br>how we build our page and limit the orders to 10 per page.<br></p><br><p>The pagination must now be changed to fit this new system which is<br>as simple as just using the new totalElements variable and the new page<br>variable that we calculated above. And so finally, the total price can be<br>calculated by simply adding up the cart totals of every order if they<br>are displayed (on this page) or not. This way it can calculate the<br>totals across all pages. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop and any other product lists not covered </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167578007-cf1f3952-a6a0-4518-b260-89ac0e09311f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop Page Pagination<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167578119-b008f728-94d3-46c9-8d47-75af6ec32c49.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop Card Page Pagination<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167578241-132e9a13-62c1-46d4-8da5-5ac26791f2ac.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin List Page Pagination<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167578389-14971148-7242-45f0-9829-12a49b6a5c50.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Order History Page Pagination<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167562691-94946d11-c2b7-4f3c-bc88-80f7e49ac317.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Product Page reviews/ratings Pagination<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/127">https://github.com/SahilBamb/IT202-010/pull/127</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/136">https://github.com/SahilBamb/IT202-010/pull/136</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php">https://sb59-prod.herokuapp.com/Project/checkout/checkoutHistory.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/shopCards.php">https://sb59-prod.herokuapp.com/Project/shopCards.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/shopCards.php?shopStyle=on">https://sb59-prod.herokuapp.com/Project/shopCards.php?shopStyle=on</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/product_page.php?id=11">https://sb59-prod.herokuapp.com/Project/product_page.php?id=11</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/admin/list_items.php">https://sb59-prod.herokuapp.com/Project/admin/list_items.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167568473-b9d8487d-65d5-4ba8-8e45-214aeec22a1f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin can view out of stock products on the list_items page through use<br>of a filter (maximum stock amount).<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167574235-a23f7fc3-f103-446b-b6b1-b57f558c9928.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin users can see products with zero stock while non-admin users cannot.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/127">https://github.com/SahilBamb/IT202-010/pull/127</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/134">https://github.com/SahilBamb/IT202-010/pull/134</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/101">https://github.com/SahilBamb/IT202-010/pull/101</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/shopCards.php">https://sb59-prod.herokuapp.com/Project/shopCards.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>When any user enters the Shop Page a SQL query will be prepared<br>to SELECT relevant product fields FROM the Products table WHERE 1=1. This allows<br>us to add additional filters or WHERE condtions as desired. So the sql<br>query will additionally be prepared differently if the user has the admin role<br>or if they do not. Without the admin role, the query will add<br>&#39;AND visibility = 1 AND stock &gt; 0&#39; to the end of the<br>WHERE clause. This will exclude all products not fitting that criteria. If the<br>user is an admin they will not have those restrictions and thus all<br>the products will be visible on the page. </p><br><p>On the Product List Page,<br>which is admin only, being able to see out of stock options was<br>implemented as a filter. This was done alongside other filters like category and<br>sort by price. The out of stock option was implemented as a &quot;Maximum<br>Stock Amount&quot; option with the placeholder value telling the user to &#39;input 0<br>to search for out of stock items&#39;. If a non-zero number is submitted<br>into the form, it will simply display a header saying the &#39;Filter Applied<br>Maximum Stock Amount: X&#39;. If a zero number is submitted, it will display<br>a special header message: &quot;Showing Products Out of Stock&quot;. This is done by<br>simply checking the $_GET variables value and displaying the relevent message. </p><br><p>The actual<br>filtering is done by simply checking if the $_GET variable&#39;s maxStock variable isset<br>before preparing a partial SQL query, such as &quot; AND stock &lt;= :mstock&quot;,<br>with placeholders for the maximum stock value. Then when combined with the other<br>filter values and pagination in a similar way, binding all the relevant variables<br>we got from the $_GET and submitting the SQL query to the database.<br>The SQL query will be different than the original: SELECT relevant product fields<br>FROM Products table WHERE 1=1 followed by all of our filters. </p><br><p>There is<br>also some basic validation checking to make sure that the maximum stock values<br>are not negative (as well as the previous serverside validation for the other<br>filters). <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167569462-38f78da9-2dbc-462b-a3be-d2059c314124.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Sort by rating in shop cards mode. It is more difficult to see<br>them being sorted correctly because there is no rating visible. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167568966-4952faff-abe8-4d03-adb5-35c5ef01d953.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Sort by rating in catalog mode. My store displays the shop page as<br>a catalog and as shop cards. It is easier to see them sorted<br>by rating in the catalog mode because there is a rating column. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/130/">https://github.com/SahilBamb/IT202-010/pull/130/</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/Project/shopCards.php?shopStyle=on&search=&category=&SortByRating=1">https://sb59-prod.herokuapp.com/Project/shopCards.php?shopStyle=on&search=&category=&SortByRating=1</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on sho</td></tr>
<tr><td> <em>Response:</em> <p>On the Shop Page, with the SQL database query to get all the<br>product information, one of the relevant product fields is AVGRating. This is a<br>column within the Products table that contains the average rating of a product<br>that is calculated whenever a user rates a product. </p><br><p>On the Product Page<br>for any given product, when a user fills out the GET form to<br>rate a product we INSERT INTO Ratings table with the product_id, user_id, rating<br>and comment. But we also update the AVGRating field within the Products table.<br></p><br><p>The latter is done by first doing another SQL query to SELECT rating<br>from Ratings table JOIN-ed with the User&#39;s table ON user_id = id of<br>the User&#39;s table WHERE product_id = :pid. :pid will be a placeholder we<br>will bind to the product page we are on (found in the $_GET).<br>This is to actually pull all the numerical rating information we have for<br>the product. Doing a foreach loop through the results of this query we<br>can add up all the ratings of a particular product. Now that we<br>have the total summed up reviews calculated in a loop, and the total<br>number of reviews found by an iterator in the same loop, we can<br>simply divide total ratings by number of ratings ($rating/=$reviewCount;) to retrieve the average<br>rating. One important step is to make sure that there are not 0<br>ratings or this will cause a divide by zero error. </p><br><p>Now we simply<br>prepare a SQL query with UPDATE Products SET AVGRating = :avgrat WHERE id=<br>:pid. The :avgrat placeholder is bound with the average rating we just calculated<br>and the :pid is bound with the product id we got from the<br>$_GET variable earlier. This is how we update the average product rating in<br>the Products table whenever we rate a product. </p><br><p>Now to actually sort by<br>average rating on the shop page is simply done through the usual filter<br>process. Checking if the SortBy SortByRating variable isset in the $_GET and then<br>adding &#39;ORDER BY AVGRating DESC&#39; to the end of the SQL query. The<br>returned result will sort the products by highest average rating to lower average<br>rating. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone4.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167754830-bc4ee8d8-7ef5-449e-8afb-cad87b674fd1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of proposal.md file with correct checkmarks, dates and link to milestone4.md. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/168203454-f36d6200-85c8-4822-803b-3e3e6df224f5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of proposal.md file (in Github) with correct checkmarks, dates and link to<br>milestone4.md. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/168203874-804a8fd3-4a43-4707-9882-d4669237f788.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project board showing all completed issues and none in To-Do or Pending<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/167754969-ba4b3efc-c9fd-42c0-9d4e-652732f307bd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Issues showing all Issues are completed and closed. <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-4-shop-project/grade/sb59" target="_blank">Grading</a></td></tr></table>