<table><tr><td> <em>Assignment: </em> JavaScript & CSS Challenge</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 2/18/2022 4:14:52 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/javascript-csschallenge/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ul>
<li>Reminder: Make sure you start in dev and it&#39;s up to date<ol>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
<li><code>git checkout -b M3-Challenge-HW</code></li>
</ol>
</li>
</ul>
<ol>
<li>Create a copy of the template given here: <a href="https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c">https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c</a> </li>
<li>Implement the changes defined in the body of the code</li>
<li><strong>Do not</strong> edit anything where the comments tell you not to edit, you will lose points for not following directions</li>
<li>Make changes where the comments tell you (via TODO&#39;s or just above the lines that tell you not to edit below)<ol>
<li><strong>Hint</strong>: Just change things in the designated <code>&lt;style&gt;</code> and <code>&lt;script&gt;</code> tags</li>
<li><strong>Important</strong>: The function that drives one of the challenges is <code>updateCurrentPage(str)</code> which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.</li>
</ol>
</li>
<li>Create a branch called M3-Challenge-HW if you haven&#39;t yet</li>
<li>Add this template to that branch (git add/git commit)</li>
<li>Make a pull request for this branch once you push it</li>
<li>You may manually deploy the HW branch to dev to get the evidence for the below prompts</li>
<li>Create a new file <strong>m3_submission.md</strong> file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)</li>
<li>Add, commit, and push the submission file</li>
<li>Close the pull request by merging it to dev (double-check all looks good on dev)</li>
<li>Manually create a new pull request from dev to prod (i.e., base: prod &lt;- compare: dev)</li>
<li>Complete the merge to deploy to production</li>
<li>Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Completed Challenge Screenshots </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Primary page with the checklist items completed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154726268-6ac49376-f92f-41e6-82cc-15fba2dcc110.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the primary page with the checklist items all completed<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot showing after the login link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154726308-4976106a-df7f-4c2f-993a-b3e8ec87d37e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the page after the login link is clicked. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot showing after the register link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154726374-83ac8fa6-4705-4ff6-99ba-1492904d1e49.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the page after the register link is clicked. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Screenshot showing after the profile link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154726462-4361f30a-619f-41b8-85dc-e5cf027473f6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the page after the profile link is clicked. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Screenshot showing after the logout link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/154726511-793274b8-e916-48bc-8481-3cb3f92da8e8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This screenshot shows the page after the logout link is clicked. <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Explain Solutions (Grader use this section to determine completion of each challenge) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly explain how you made the navigation horizontal</td></tr>
<tr><td> <em>Response:</em> <p>I used CSS to make the navigation horizontal. Within the style tags in<br>the head, I changed the property of display to inline. This was applied<br>to all all <li> elements, inside <ul> elements inside <nav> elements.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how you remove the navigation list item markers</td></tr>
<tr><td> <em>Response:</em> <p>I used CSS to remove the navigation list item markers. Within the style<br>tags in the head, I changed the property of list-style-type to none;. This<br>was applied to all all <li> elements, inside <ul> elements inside <nav> elements.<br>This was also done in the same line of code as Sub-Task 1.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you gave the navigation a background</td></tr>
<tr><td> <em>Response:</em> <p>I used CSS to add a background to the navigation. I achieved this<br>by using the nav selector to select all elements that were in nav<br>and changing the background-color property to lightblue. I thought it looked better to<br>have the entire navigation with a light blue background rather than just the<br>links. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how you made the links (or their surrounding area) change color on mouseover/hover</td></tr>
<tr><td> <em>Response:</em> <p>This was done using CSS. The <a> tag is used for links and<br>the a selector selects all elements that are a, thus selects all the<br>links. This was achieved by adjusting the a elements hover pseudo-class and changing<br>its color property to green. This will be mentioned in my own styling,<br>but I also added a transition to fade it slowly over two seconds.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you changed the challenge list bullet points to checkmarks (✓)</td></tr>
<tr><td> <em>Response:</em> <p>I used CSS within the style part of the head. I used the<br>ul selector to select all elements and changed their list-style property to &#39;✓<br> &#39;. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain how you made the first character of the h1 tags and anchor tags uppercased</td></tr>
<tr><td> <em>Response:</em> <p>I used CSS and used selector for both a and h1 to select<br>their elements and used the text-transform property to capitalize the first letter. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain/describe your custom styling of your choice</td></tr>
<tr><td> <em>Response:</em> <p>My first custom styling was adding a black border around the navigation, this<br>was done by using the nav selector and changing the border property to<br>1px solid black. Another custom styling that was added was adding a background<br>image and border to the h3 elements. This was done by using the<br>h3 selector and changing the background-image and url properties. Finally the last custom<br>styling that was added was adding a two second fade for the link<br>color change mouseover. This was done using the a selector and -webkit-transition: and<br>transition properties. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain how the styling for the challenge list doesn't impact the navigation list</td></tr>
<tr><td> <em>Response:</em> <p>The way that the styling for the challenge list doesn&#39;t impact the navigation<br>list is through the :not() selector. This is done by putting the ul<br>li :not(a) selectors. This selects li elements inside ul elements but excludes a<br>elements. All of navigation are a elements so this effectively excludes nav. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Briefly explain how you updated the content of the h1 tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>NOTE: This was done a different way then the hint suggested and does<br>not use the updateCurrentPage() function. This was done using Javascript within the script<br>tags in the head. The first thing is to add an event listening<br>to the document, but first wait for the content to be loaded. This<br>is important as if this is not included, then there will not be<br>any content to attach the next eventlistener to. Next it is to find<br>the elements of the navigation, done through the getElementsByTagName and check for clicks.<br>If any element within nav is clicked upon, it willuse a setTimeout to<br>alter the innerText of the h1 tag and the title tag to window.location.href<br>or the url. The timeout is neccessary becuase without it, it will try<br>and update the tags innerText without the url updating. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain how you updated the content of the title tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>This was done the sam eway as the h1 tag except using the<br>title tag instead through document.getElementsByTagName(&quot;title&quot;)[0].innerText = window.location.href; Again wtih a timeout to allow<br>time for the page to update. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Comment briefly talking about what you learned and/or any difficulties you encountered and how you resolved them (or attempted to)</td></tr>
<tr><td> <em>Response:</em> <p>The CSS part was relatively simple to understand and just took some time<br>understanding each of the selectors. On the other hand the JavaScript part was<br>very tricky as I struggled to get a cohesive understanding of when each<br>part runs. I ultimately learned a lot through it and I think having<br>a few more problems like this to solve (or just problems like create<br>this page) would be extremely helpful in cementing these concepts. I really thought<br>I understood HTML CSS and JavaScript a lot better than I did after<br>reading the slides, but this assignment really put me in my place. Ultimately<br>it was good excersize and made me learn a lot. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your pull request (hw branch to dev only)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/9">https://github.com/SahilBamb/IT202-010/pull/9</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to your solution html file from prod (again you can assume the url at this point)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/blob/prod/public_html/challenge.html">https://github.com/SahilBamb/IT202-010/blob/prod/public_html/challenge.html</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/javascript-csschallenge/grade/sb59" target="_blank">Grading</a></td></tr></table>
