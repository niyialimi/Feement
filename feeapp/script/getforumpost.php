<?php
require_once('../../req/config.php');
session_start();
$forumselect="select * from forum_table";
//$forumselect="select forum_table.*,feeclient_table.feeclient_lname,feeclient_table.feeclient_fname from forum_table inner join feeclient_table";
									$rt=mysqli_query($con,$forumselect);
									if(mysqli_num_rows($rt))
									{
										while($row=mysqli_fetch_array($rt))
											{
												$id=$row['feeclient_id'];
												$nameselect="select * from feeclient_table where feeclient_id='$id'";
												{
													$rst=mysqli_query($con,$nameselect);
													if(mysqli_num_rows($rst))
													{
														while($rows=mysqli_fetch_array($rst))
															{
												echo '<div id="forumbox">
                                                <div id="forumcontent"><img src="../../assets/faces/avatar51.png" width="50" height="50" class="img-circle"><span><strong>'.$rows['feeclient_lname']." ".$rows['feeclient_fname'].'  |   <i class="fa fa-pencil-square-o"></i>  '.$row['post_time'].'</strong></span><p><font class="posttitle">'.$row['topic'].'</font><br><font class="postcontent">'.$row['content'].'</font></p><a href="" class="btn btn-sm btn-info pull-right" id="forumreply"><i class="fa fa-pencil"></i>  Reply</a></div></div>';
															}
													}
												}
											}
									}
?>