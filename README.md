# mathclass
This is a website for which I have wrote for my math teacher. 

It uses the Twitter Boostrap Framework for a nice and sleek design. 

The main features -

Admin Panel
  - SQLI/XSS/CSRF Protection
  - Add Homework for different classes
    - The homework is stored in a database and is echoed out via a chart
      - Example: <td><?php echo htmlentities($row['number'], ENT_QUOTES, 'UTF-8'); ?></td> 
    
User Interface
  - View the homework in a Bootstrap Styled Chart that is retrieved from the Database
  
All Rights Reserved.
  
  
  
