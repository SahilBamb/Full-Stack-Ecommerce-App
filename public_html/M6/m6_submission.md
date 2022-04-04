<table><tr><td> <em>Assignment: </em> HW HTML5 Canvas Game</td></tr>
<tr><td> <em>Student: </em> Sahil Bambulkar(sb59)</td></tr>
<tr><td> <em>Generated: </em> 3/27/2022 11:48:16 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/hw-html5-canvas-game/grade/sb59" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Create a branch for this assignment called <em>M6-HTML5-Canvas</em></li>
<li>Pick a base HTML5 game from <a href="https://bencentra.com/2017-07-11-basic-html5-canvas-games.html">https://bencentra.com/2017-07-11-basic-html5-canvas-games.html</a></li>
<li>Create a folder inside public_html called  <em>M6</em></li>
<li>Create an html5.html file in your M6 folder (do not put it in Project even if you&#39;re doing arcade)</li>
<li>Copy one of the base games (from the above link)</li>
<li>Add/Commit the baseline of the game you&#39;ll mod for this assignment <em>(Do this before you start any mods/changes)</em></li>
<li>Make two significant changes<ol>
<li>Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once.</li>
<li>Direct copies of my class example changes will not be accepted (i.e., just having an AI player for pong, rotating canvas, or multi-ball unless you make a significant tweak to it)</li>
<li>Significant changes are things that change with game logic or modify how the game works. Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once). You may however change such values through game logic during runtime. (i.e., when points are scored, boundaries are hit, some action occurs, etc)</li>
</ol>
</li>
<li>Evidence/Screenshots<ol>
<li>As best as you can, gather evidence for your first significant change and fill in the deliverable items below.</li>
<li>As best as you can, gather evidence for your significant change and fill in the deliverable items below.</li>
<li>Remember to include your ucid/date as comments in any screenshots that have code</li>
<li>Ensure your screenshots load and are visible from the md file in step 9</li>
</ol>
</li>
<li>In the M6 folder create a new file called m6_submission.md</li>
<li>Save your below responses, generate the markdown, and paste the output to this file</li>
<li>Add/commit/push all related files as necessary</li>
<li>Merge your pull request once you&#39;re satisfied with the .md file and the canvas game mods</li>
<li>Create a new pull request from dev to prod and merge it</li>
<li>Locally checkout dev and pull the merged changes from step 12</li>
</ol>
<p>Each missed or failed to follow instruction is eligible for -0.25 from the final grade</p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Game Info </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game did you pick to edit/modify?</td></tr>
<tr><td> <em>Response:</em> <p>I decided to edit the Professor&#39;s pong game, but I changed it considerably<br>so it does not resemble pong at all anymore. I turned it into<br>a shooter game with scaling difficulty, weapons, health and score. More details about<br>specific features are included below. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the direct link to the html5.html file from Heroku Prod (i.e., https://mt85-prod.herokuapp.com/M6/html5.html)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sb59-prod.herokuapp.com/M6/pong.html">https://sb59-prod.herokuapp.com/M6/pong.html</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link for this assignment from M6-HTML5-Canvas to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/SahilBamb/IT202-010/pull/42">https://github.com/SahilBamb/IT202-010/pull/42</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Significant Change #1 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>I added &#39;Left&#39; and &#39;Right&#39; movement, a health bar and changed score to<br>iterate when enemies are destroyed rather than when points are scored. When enemies<br>breach the left side of the screen, the health goes down. Enemies can<br>be destroyed by shooting projectiles. The game ends when health bar reaches zero.<br></p><br><p>In order to limit the number of elements in the list, each time<br>element is no longer visible or is &#39;killed&#39; it is removed from the<br>list. This is important as there is an exponential growth of elements in<br>the list in the later stages of the game so anything to lessen<br>the burden is valuable. (Please note: this feature was disabled because it was<br>creating a worse gameplay experience. It still available but commented out.)<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160322830-f5e7c068-9521-44cd-b61b-f57ced6f82c0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>The image shows one of the shotgun weapon firing projectiles right (turquoise) and<br>the enemies moving left (green).  It also shows increased enemy spawn with<br>the increased score. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160322892-9b77b417-df1a-44c8-b86f-af621d758353.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This image shows the basic weapon firing projectiles (blue) and the enemies moving<br>left (green). It also shows the changed player model (spaceship). <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160098199-be346b74-149c-4ee7-b06e-4b6af221f8ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the enemy system and powerup functions, comments in code explain how<br>it works. <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160098231-e3b19e4e-44c3-46ae-83bd-e3ebe2da5825.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the movement and shooting system, comments in code explain how it<br>works.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Significant Change #2 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>I added an Enemy and Powerup system. <br>The enemy system spawns enemies in<br>random intervals on the right side of the screen but randomly on the<br>y-coordinate. The frequency of their spawning correlates to the player&#39;s score, as in<br>higher the higher it is the more often enemies spawn. Collision detection was<br>done by allowing each projectile to scan through the list of all objects<br>and &quot;kill them&quot; or make them &#39;unvisible&#39; if there is a collision. <br>I<br>also added a power-up system that allows you to use 4 different weapons:<br>basic, shotgun, laser and spray. They all have slightly different features such as<br>variable projectile number, different size projectile, different color and straight or diagonal travel.<br>I also added in changes to the tip of the spaceship based on<br>the weapon being used, so the spaceship tip matches the weapon color. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160323023-21b30df7-617c-4340-bc5b-5b9587c20a24.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>The image shows one of the scatter shot weapon firing projectiles right (orange)<br>and also shows the health and the score. <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160098785-2a3d803f-eca8-4462-a801-456c12058b6e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the overarching projectile logic and how it detects and deletes enemies<br>on the screen<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/42818731/160098321-dcc2e714-e93b-4ce1-bd90-f48941fc12be.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the each projectiles differences and how they were implemented (better explained<br>in code comment) <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Discuss </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Talk about what you learned during this assignment and the related HTML5 Canvas readings (at least a few sentences for full credit)</td></tr>
<tr><td> <em>Response:</em> <p>I learned how powerful HTML5 was in rendering and supporting games. I always<br>viewed the browser as very limited, but its exciting to see how far<br>it has come. Specifically, many small 2D games I made in Python I<br>was not able to share with my friends (who were not as technically<br>capable to install and launch a Python program). Now if I can simply<br>re-write the game in JavaScript I will be able to share it with<br>them. In terms of actually using it I learned that canvas creates a<br>rectangular area on an HTML page that allows for on the fly image<br>rendering through JavaScript. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/hw-html5-canvas-game/grade/sb59" target="_blank">Grading</a></td></tr></table>