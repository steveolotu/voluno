<?php

#access (open)
if(current_user_can('manage_options')){
  
  #title (open)
  if(1==1){
    echo '
    <h1>
    Admin msql execution page to send messages form anyone to anyone
    <br>
    See "members-net-my-messages.php"
    </h1>';
  }
  #title (close)

  
  #sending process (open)
  if(isset($_POST['admin_test_new_message_submit'])){
      #conversation id - add all conversation partners to the array, gets ordered
          $function_add_new_message__partner_id_array[] = $_POST['admin_test_new_message_recipient'];
          $function_add_new_message__partner_id_array[] = $_POST['admin_test_new_message_sender'];
      #admin code to send from any account
          $function_add_new_message__admin_message_code = $_POST['admin_message_code'];
      #message data - all will be sanitized
          $function_add_new_message__message_content = $_POST['admin_test_new_message_content'];
          $function_add_new_message__messsage_author_id = $_POST['admin_test_new_message_sender'];
      include('#function-add-new-message.php');
  
    /*
    echo '
    <script>
      jQuery(document).ready(function(){
        window.location = window.location.href;
      });
    </script>';
    */
  }
  #sending process (close)
  
  
  #result (open)
  if(1==1){
    
    echo '
    Message sent successfully!
    <br>
    <a href="'.get_permalink(696).'">
      Visit messages page
    </a>
    ';
  
  
    #send messages form anyone to anyone (for mysql see top) (open)
    if(1==1){
      
      $lorem_ipsum =
      "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt".
      "ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo".
      "dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit";
      
      echo '
      <br>
      send new message
      <br>
      
      <form method="post" action="'.get_permalink(782).'">
          Sender
          <select name="admin_test_new_message_sender">';
              $all_users_query = $GLOBALS['wpdb']->prepare('SELECT *
                                              FROM fi4l3fg_voluno_users_extended;');
              $all_users_results = $GLOBALS['wpdb']->get_results($all_users_query);
              foreach($all_users_results as $all_users_row){
                  echo '
                  <option value="'.$all_users_row->usersext_id.'">'.$all_users_row->usersext_displayName.'</option>
                  ';
              }
          echo '
          </select>
          <br>
          Recipient
          <select name="admin_test_new_message_recipient">';
              foreach($all_users_results as $all_users_row){
                  echo '
                  <option value="'.$all_users_row->usersext_id.'">'.$all_users_row->usersext_displayName.'</option>
                  ';
              }
          echo '
          </select>
          <br>
          Content
          <textarea name="admin_test_new_message_content" style="width:100%;">'.$lorem_ipsum.'</textarea>
          <input type="hidden" name="admin_message_code" value="c84hfc8wh84gvghojvcFKasj4f2Fa4f4wfaf2hh25hrwsvd45t5z67j7u12609500832Wv3v">
          <br>
          <input type="submit" value="send" name="admin_test_new_message_submit">
      </form>';
    }
    #send messages form anyone to anyone (for mysql see top) (close)

  
  }
  #result (close)
  
}
#access (close)


#no access (open)
else{
  
  echo '
  You do not have access to this page.';
  
}
#no access (open)


?>