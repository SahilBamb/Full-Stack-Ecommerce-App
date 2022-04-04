<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 4/4/2022 1:37:04 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone1-deliverable/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412128-92192c75-8558-42f6-bbc6-2c03ecac1118.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the register.php page and errors being reported through flash messages due<br>to an incorrect username and non-matching passwords<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412179-6d05a36d-95c8-470e-b69f-9e7f2733488b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot shows the successful registering of a user<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412239-8c830d8d-4839-4ced-8ea0-480074d977b1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows an attempt at registering the same user twice and running<br>into an error.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161411794-c9411fc6-4544-436f-90d8-9e16a7012005.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the Users table with data in it from the register<br>feature register.php<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/47">https://github.com/SahilBamb/IT202-010/pull/47</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/19">https://github.com/SahilBamb/IT202-010/pull/19</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The user is able to register through a form that has an onsubmit<br>attribute before validating its input through JavaScript. This input is the email, password,<br>confirm password fields that are all sent through POST. It is done through<br>POST so it is not shown in the URL and is more secure.<br>Client Side validation is done through JavaScript to validate each of the fields<br>such as username format, email format (both with regex) and password matching confirm<br>password. As the JavaScript function returns as onsubmit=&quot;return validate(this)&quot; it will only allow<br>the form to submit when the JavaScript validation is true. This will then<br>move to Server Side validation in PHP which mirrors much of this validation<br>as a backup. If all of this validation works, it will hash the<br>password and will attempt to update the database through PDO. This is done<br>through a SQL command that is filled in with placeholders. In SQL, it<br>will use an INSERT INTO to insert in the Users table the email,<br>password and username values of the new user. If this works successfully it<br>will return a success message and if it fails, it will check if<br>there is a duplicate user and inform the user of this in a<br>flash message. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412374-718945d1-55d0-4e6d-b08c-d1500f3d95de.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the input of an invalid email address and an incorrect<br>username (these were subsequently inputted but the screenshot was made to show both<br>error messages). <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412489-8e9943b5-9615-40db-90ba-2cf0f0637b84.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user trying to login without a correct password.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412494-d500f2c5-85ee-47b1-ad05-5b56b581c2e2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user trying to login without a correct username.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161466986-c5c83426-4991-4e3b-9d39-353b570635c4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user successfully login. I intentionally kept open the browser&#39;s<br>&quot;save password?&quot; prompt to demonstrate this and display the username and (censored) password<br>used to login. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/19">https://github.com/SahilBamb/IT202-010/pull/19</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/48">https://github.com/SahilBamb/IT202-010/pull/48</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Logging in works first by using a form to take in input through<br>onsubmit and validating using a form, JavaScript validation and PHP validation very similar<br>to registration. Because most of that validation is exactly the same, I will<br>not repeat that here but one difference is that it allows the user<br>to login using either an email or a username. This functions by changing<br>the form type to text from email. Then in the JS and PHP<br>validation it uses the @ symbol to differentiate between emails and usernames. It<br>then validates each differently checking for 2-6 length email format for email and<br>3-16 lowercase letters, numbers and _ or - for usernames. After validation it<br>connects to the database through PDO and if there is a email or<br>user found, it will hash and unsent the password before looking for a<br>match. In SQL, this is done by a SELECT FROM WHERE query where<br>it selects the id, email and username and password from the table where<br>the email or username match. If there is a match it will welcome<br>the user and fill the magic $_SESSION variable with the user information. It<br>will then attempt to use PDO to run another SQL statement on the<br>database to assign roles to that user. In SQL, this is done through<br>a SELECT FROM WHERE but with a JOIN which joins the Roles and<br>UserRoles table and fetching all roles of the user through fetchAll(). Finally, it<br>will redirect the user to home page with a welcome message. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412622-5475a43c-3e06-4056-8289-9d8fbecf9621.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user successfully logging out. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161450609-fc1c958c-360d-4ae2-a6ab-b2fb7b87b7ff.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the user trying to access the &#39;profile.php&#39; page<br>without being logged in. It redirects the user to the login page with<br>an error message.  <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/49">https://github.com/SahilBamb/IT202-010/pull/49</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The logout.php page will start a session and unset the variables before destroying<br>it. Instead of deleting the cookie it wait for it to expire. Finally,<br>it will redirect the user back to the login page with the success<br>message that they successfully logged out. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161445537-3057a107-9f29-46ad-813a-fefdc749c431.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the user trying to access the &#39;profile.php&#39; page<br>without being logged in. It redirects the user to the login page with<br>an error message.  <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161444654-d273da50-7b31-440c-97d1-0d3ce2a3ba36.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the user attempting to access the &#39;assign_roles.php&#39; site<br>before being redirected to &#39;home.php&#39; with a relevant error message. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161453394-5f135dc7-1c8e-42db-aea6-170600a955e8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the associative table Roles table with one element<br>representing the admin role. It is active. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161453395-257f2409-25b0-409c-a7e5-5786ad6b97dc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the associative table UserRoles table with one element<br>representing the admin role. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/53">https://github.com/SahilBamb/IT202-010/pull/53</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Login protected pages will work by simply checking if a user is logged<br>in order to provide access, and bouncing them with an error message if<br>they are not logged in. For example, if a user tries to access<br>the profile.php page without being logged in, the page checked if is_logged_in() and<br>gives them an error flash message and redirects them to login. Another example<br>of content being login-protected is in nav with profile.php and logout.php. These two<br>pages are not visible on the top navigation unless the user is logged<br>in and is implemented through the is_logged_in() function. This function, from user_helpers.php, simply<br>checks the magic $_SESSION variable if a [&quot;user&quot;] is set and returns a<br>boolean for true or false. Another example of this would be the register<br>and login buttons which are not visible after a user is logged in<br>(checks NOT is_logged_in()). <br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Our goal is to provide an authorization system so that certain features of<br>the website to only be accessible to certain &quot;roles&quot;. For example, only admins<br>should be able to assign, create and list roles. Thus, a user with<br>an admin role will be able to access the create_role.php page if they<br>have a certain role, and if they do not, it kicks them back<br>to some page (home.php). This is implemented through a Roles table that defines<br>what roles are available and a UserRoles table that is an association table<br>that forms a many to many relationship between Users and Roles. Roles are<br>assigned during login, with using PDO and SQL to retrieve all the rows<br>that a user has and storing it in a $_SESSION magic variable. Then<br>when the user navigates to pages, the has_role() function is called which runs<br>through the user&#39;s roles (again in $_SESSION) until it finds a match. If<br>it does not find a match it returns false and the page prints<br>a flash message and redirects the user to the home page. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161413377-57300d5b-ce0f-496f-b3e3-e03839f1cf90.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Included is the changed font, changed background colors, centering and a changed button.<br>It also shows one of the new flash messages (also changed for danger,<br>warning, etc.). Finally it shows the new navigation bar which lights up on<br>hover. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/51">https://github.com/SahilBamb/IT202-010/pull/51</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>For the navigation bar, navigation.css is used as a separate file and included<br>with a stylesheet link tag in nav.php. The styling causes each link in<br>the navigation to become a horizontal connected bar, with each link being a<br>rectangle that lights up gray when hovered over. The background is dark gray<br>and the text color is white. </p><br><p>For pages with forms the form.css file<br>is used, there is a faded light blue background to the h1 and<br>form elements. The form element is also centered and has padding around its<br>input[type=submit] button with a dark blue background color and white text color to<br>make it distinct. </p><br><p>For pages without forms, the mystyle.css is used which gives<br>the body a background color of light blue and colors the text in<br>h1 with navy. It also centers all elements in h1 and div. </p><br><p>Also,<br>the flash messages were changed to be pastel colors of blue, green, red<br>and orange and slighter darker pastel matching colors. </p><br><p>Finally a custom font Open<br>Sans is used on each page that was imported from google fonts and<br>requires additional link element in each of the php pages before the stylesheet<br>is brought in with its own link element.<br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412128-92192c75-8558-42f6-bbc6-2c03ecac1118.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is an example of a &quot;user friendly&quot; output or error message. It<br>clearly says what the issue is in clear english. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412987-dce8d20f-facc-4afe-8b10-bcf2b55b48e1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows flash message errors for an incorrect email, invalid username and<br>wrong password and clearly says what is wrong<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412239-8c830d8d-4839-4ced-8ea0-480074d977b1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a flash message that clearly explains that the username is<br>already taken and cannot be chosen. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/52">https://github.com/SahilBamb/IT202-010/pull/52</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>The error messages were made friendly by removing all var_export dumps and instead<br>replacing them with specific instructions on what the error was and how the<br>user can fix it. For example, if there was a format error making<br>it clear what the error was such as the password was too short<br>or the username can only have a-z0-9-_ characters. This is done through a<br>series of if statements in Client Side validation through JavaScript and Server Side<br>validation through PHP in the register.php, profile.php, login.php files. If the inputted form<br>POST value fails any of these checks, it will alert the user with<br>a flash message and set the isValid flag to false and the $hasError<br>flag to true in PHP not allowing it to progress. OrMultiple flash messages<br>will allow the user to see all the errors all at once instead<br>of seeing one at a time. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412885-4534076c-7967-4cc0-9625-9ebdbf18794f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a user viewing his profile<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/50">https://github.com/SahilBamb/IT202-010/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The code for profile.php first checks if the user is logged in using<br>the is_logged_in function that was explained previously. If it fails the check, it<br>provide a flash message with an error and redirect the user to the<br>login page to login. Then it will display the user&#39;s profile consisting of<br>their username and email as prefilled in within the form. This is done<br>by setting the value of each input to the safe echo (se() function)<br>of the email and username from $_SESSION magic variable (done through get_username() and<br>get_user_email() helper functions). <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412987-dce8d20f-facc-4afe-8b10-bcf2b55b48e1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows flash message errors for an incorrect email, invalid username and<br>wrong password. This invalid email, username and password was kept in the form<br>for display purposes but when submitted it reverts the profile back to the<br>original without editing it. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161412985-fb2527d4-b58f-42c1-87f8-2c64a95f4921.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows flash message errors for two passwords that do not match<br>and are not long enough. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161475262-3e48c799-9d00-4cb8-b45e-f27e6d4bafc3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows a flash message displaying a successful profile update. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161413250-c3829b8e-7de5-4e8e-ac6c-66661dc6cfdb.jpeg"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is an edited screenshot of the user table before and after editing<br>a user&#39;s email and username. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/50">https://github.com/SahilBamb/IT202-010/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The editing works by first performing Client Side JavaScript validation on the form<br>and only submitting it to PHP Server Side validation before finally attempting to<br>make changes to the database through PDO and SQL. The logic of these<br>checks is identical to register and login and is explained more in-detail above.<br>The main difference is that it will only check and attempt to validate<br>the password fields if the current password, password or confirm password fields are<br>filled in when submitted. This will allow a user to only update their<br>username and email without receiving errors for having incorrectly formatted or empty password<br>fields. In SQL it will use an UPDATE WHERE query where it will<br>update the users table and set email to the new email and username<br>to the new username and throw an error if there is a duplicate.<br>If the password section is all validated, it will compare it to the<br>password in the data base and use an UPDATE WHERE query to set<br>password to the new password where the id matches the user. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161465381-bd8f43a6-a59c-41c5-a070-1d15b6dc9568.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is my proposal.md file with checkmark, dates, and link to milestone1.md and<br>a direct link to the path on heroku prod<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161480098-60ff4530-9a6a-4053-8169-debdaeb7e897.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Completed Milestone1 Project Board (all items moved to done section on right)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/161480250-09aca07d-96fe-4516-afc3-9bd634b22e7c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Completed Milestone1 Issues with all Issues closed <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone1-deliverable/grade/sb59" target="_blank">Grading</a></td></tr></table>