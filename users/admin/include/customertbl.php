<tbody>
                                            <?PHP
              
             

              //pagination



  if (isset($_GET['page_no']) && $_GET['page_no']!="") {
      $page_no = $_GET['page_no'];
      } else {
          $page_no = 1;
          }
  
      $total_records_per_page = 10;
      $offset = ($page_no-1) * $total_records_per_page;
      $previous_page = $page_no - 1;
      $next_page = $page_no + 1;
      $adjacents = "2"; 
  
      $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM  customer ");
      $total_records = mysqli_fetch_array($result_count);
      $total_records = $total_records['total_records'];
      $total_no_of_pages = ceil($total_records / $total_records_per_page);
      $second_last = $total_no_of_pages - 1; // total page minus 1     

     

  

                            

            $query="SELECT * from customer
            LIMIT $offset, $total_records_per_page";
            $result=mysqli_query($conn,$query);
            
            $rows=mysqli_num_rows($result);
            
           
            
            if ($rows>0) {
              
              ?>
                                            <?php
                                               $x=1;
                                               while ($rows=mysqli_fetch_array($result)) {

                                                if($rows['account_status'] == '0')
                                                {
                                                    $delivered='<span style="background: #17e305;color: rgb(255,255,255);font-size: 14px;border-radius: 6px;padding-right: 3px;padding-left: 3px;padding-bottom: 2px;padding-top: -1px;">Active</span>';

                                                }else
                                                {

                                                  $delivered='<span style="background: red;color: rgb(255,255,255);font-size: 14px;border-radius: 6px;padding-right: 3px;padding-left: 3px;padding-bottom: 2px;padding-top: -1px;">Suspended</span>';
                                                }
                             
                                             ?>
                                                <tr>
                                                    <td style="font-size: 13px;"><?php echo $x; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['firstname'];?></td>
                                                    <td  style="font-size: 13px;"><?php echo $rows['lastname'];?></td>
                                                    <td  style="font-size: 13px;"><?php echo $rows['id_number'];?></td>
                                                    <td  style="font-size: 13px;"><?php echo $rows['gender'];?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['email'];?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['phone_number'];?></td>
                                                    <td style="font-size: 13px;"><?php echo $delivered;?></td>
                                                    <td style="font-size: 13px;">
                                                <select onChange="window.location.href =this.value" class="form-control"style="border-radius: 0px;background: rgb(247,249,252);border-style: none;color: rgb(80,94,108);" name="" id="">
                                                    <option value="">Select</option>
                                                    <option value="activate.php?url=<?php echo $rows['customer_id']?>">Activate</option>
                                                    <option value="suspend.php?url=<?php echo $rows['customer_id']?>">Suspend</option>
                                                </select>
                                                
                                                </td>
                                                </tr>
                                                <?php
                                                        $x++;    
                                              
                                                        }
                                                       
                                                    }
                                                        ?>
                                                
                                               
                                            </tbody>