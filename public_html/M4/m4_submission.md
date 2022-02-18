<table><tr><td> <em>Assignment: </em> Init DB Setup</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 2/18/2022 3:47:46 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/init-db-setup/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <p>Reminder: Make sure you start in dev and it&#39;s up to date</p>
<ul>
<li>git checkout dev</li>
<li>git pull origin dev</li>
<li>git checkout -b ProjectSetup</li>
</ul>
<p>Steps:</p>
<ol>
<li>Create a new folder in public_html called Project</li>
<li>create a new folder in Project called sql</li>
<li>Create a new file in sql called init_db.php</li>
<li>Paste the content from <a href="https://gist.github.com/MattToegel/6a8310e3ac19fe505870e5ebfa8cf4ea">https://gist.github.com/MattToegel/6a8310e3ac19fe505870e5ebfa8cf4ea</a><ul>
<li>You will get errors if this is not in the proper location</li>
</ul>
</li>
<li>Create another file in sql called 001_create_table_users.sql</li>
<li>Paste the content from <a href="https://gist.github.com/MattToegel/f3b39da97fba38bd04fc7073ad0a627e">https://gist.github.com/MattToegel/f3b39da97fba38bd04fc7073ad0a627e</a> </li>
<li>Add/commit/push these to the new branch (if you haven&#39;t yet)</li>
<li>Create the pull request on github but do not complete it yet</li>
<li>Create a new folder in public_html called M4</li>
<li>Create a new file in the M4 folder called m4_submission.md</li>
<li>Fill out the below deliverables and paste the generated markdown in the file</li>
<li>Add/commit/push the new changes</li>
<li>Verify all of the files appear as expected in the ProjectSetup branch<ol>
<li>M4/m4_submission.md</li>
<li>Project/sql/init_db.php</li>
<li>Project/sql/001_create_table_users.sql</li>
</ol>
</li>
<li>Complete the merge/pull request from step 8</li>
<li>Create a new pull request from dev to prod and complete it</li>
<li>Go back to your local repo</li>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
<li>On github, navigate to the prod branch</li>
<li>Go to the M4 folder</li>
<li>Click the m4_submission.md</li>
<li>Paste that url to Canvas as the submission</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Verify Proper Setup </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Visit the init_db.php file in the browser on heroku dev and screenshot the working output (If it says blocked this is still valid)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154756928-69c45e37-4b41-4cee-bd87-c4126583e0e5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of the Users table being created through init_db.php<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Go to your MySQL VS Code extension, click the new table that was generated, screenshot the table shown</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154757196-c8d269c0-e6f1-457f-bfec-506592ad3dc7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>The screenshot is of the VS Code extension showing the Users table that<br>was created. <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/f2c037/000000?text=Partial"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly talk about something you learned (from the readings is preferred over the slides/class)</td></tr>
<tr><td> <em>Response:</em> <p>I previously learned about SQL in a database class which was very much<br>focused on theory. The few projects we did was using SQL queries to<br>create databases and fill tables devoid of any connection to an actual use<br>case. Learning how they could be used to store user login data is<br>obvious and at the same time very new to me. In all of<br>my projects so far, I was too intimidated to learn SQL so I<br>was storing all of my data in csv files. It will be exciting<br>learning different use cases for relational databases and how to integrate them into<br>my future projects. More specifically from W3Schools I was able to learn about<br>the difference between Group By and Having as I did not understand that<br>previously. Also the fact that joins create a separate view instead of altering<br>any of the tables. I think I knew that theoretically but did not<br>internalize it until this week. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Talk about any issues or difficulties you had in any of the processes and how you resolved them. If you didn't have issues this HW mentions a recently resolved issue that wasn't discussed before. Otherwise, just mention "no issues"</td></tr>
<tr><td> <em>Response:</em> <p>I did not have any issues this week, but I definitely struggled with<br>the JS/CSS Challenge. There were small issues that became pretty major hurdles and<br>took a lot of time. For example, the fact that the capitalize and<br>uppercase are two different things, or that comments are different in the HTML<br>section and the CSS section or certain pseduoclasses don&#39;t apply to links <a>.<br>I don&#39;t know if this is just the nature of web development, but<br>it seemed like a lot of these things just have to be remembered<br>and there is less consistency to the syntax of HTML/CSS/JavaScript than in other<br>languages. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link (ProjectSetup to Dev)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/10">https://github.com/SahilBamb/IT202-010/pull/10</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Paste the direct link from heroku prod to the init_db.php file (i.e., https://mt85-prod.herokuapp.com/Project/sql/init_db.php)</td></tr>
<tr><td>Not provided</td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/init-db-setup/grade/sb59" target="_blank">Grading</a></td></tr></table>