<table align="center" width="100%">
				<tr align="center">
					<td style="text-align: center;">
						<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px">
							<form id="loginForm" name="loginForm" method="post"	action="login-exec.php" onsubmit="return loginValidate(this)">
								<table width="290" border="0" align="center" cellpadding="2" cellspacing="0">
									<tr>
										<td colspan="2" style="text-align: center;"><font color="#FF0000">* </font>Required fields</td>
									</tr>
									<tr>
										<td width="112"><b>Email</b></td>
										<td width="188"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
									</tr>
									<tr>
										<td><b>Password</b></td>
										<td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
									</tr>
									<tr>
										<td><input name="remember" type="checkbox" class="" id="remember" value="1" onselect="cookie()"
											<?php if (isset($_COOKIE['remember_me'])) { echo 'checked="checked"';} 
											else { echo ''; } 
											?> />Remember me
										</td>
										<td><a href="JavaScript: resetPassword()" class="">Forgot password?</a></td>
									</tr>
									<tr>
										<td colspan="2"><input type="reset" value="Clear Fields" />
										    <input type="submit" name="Submit" value="Login" />
                                        </td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
								</table>
							</form>
						</div>
					</td>
					<hr>
					<td style="text-align: center;">
						<div style="border: #bd6f2f solid 1px; padding: 4px 6px 2px 6px;">
							<form id="loginForm" name="loginForm" method="post"	action="register-exec.php" onsubmit="return registerValidate(this)">
								<table width="450" border="0" align="center" cellpadding="2" cellspacing="0">
									<tr>
										<td colspan="2" style="text-align: center;"><font color="#FF0000">* </font>Required fields</td>
									</tr>
									<tr>
										<th>First Name</th>
										<td><font color="#FF0000">* </font><input name="fname" type="text" class="textfield" id="fname" /></td>
									</tr>
									<tr>
										<th>Last Name</th>
										<td><font color="#FF0000">* </font><input name="lname" type="text" class="textfield" id="lname" /></td>
									</tr>
									<tr>
										<th width="124">Email</th>
										<td width="168"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
									</tr>
									<tr>
										<th>Password</th>
										<td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
									</tr>
									<tr>
										<th>Confirm Password</th>
										<td><font color="#FF0000">* </font><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
									</tr>
									<tr>
										<th>Security Question</th>
										<td><font color="#FF0000">* </font>
                                            <select name="question" id="question" class="text-muted">
                                                <option value="select" class="text-muted">select question 
                                                <?php
                                                // loop through quantities table rows
                                                 while ($row = mysqli_fetch_array($questions)) {  
                                                     echo "<option value=$row[question_id]>$row[question_text]";
                                                                                              }
                                                ?>
                                            </select>
                                        </td>
									</tr>
									<tr>
										<th>Security Answer</th>
										<td><font color="#FF0000">* </font><input name="answer" type="text" class="textfield" id="answer" /></td>
									</tr>
									<tr>
										<td colspan="2">
                                            <input type="reset" value="Clear Fields" /> 
                                            <input type="submit" name="Submit" value="Register" />
                                        </td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
								</table>
							</form>
						</div>
					</td>
				</tr>
			</table>