 <main>

     <div style="color: green;"><?php echo $success ?? '' ?></div>

     <h1>Leave a Public Note</h1>
     <form method="POST">

         <div>
             <label for="name">Name:</label>
             <input type="text" name="name">
             <p style="color: red;"><?= $errors['name'] ?? ''  ?></p>
         </div>
         <div>
             <label for="email">Email:</label>
             <input type="email" name="email">
             <p style="color: red;"><?= $errors['email'] ?? ''  ?></p>
         </div>

         <div>
             <label for="message">Message</label>
             <textarea name="message" id="message" rows="6"></textarea>
             <p style="color: red;"><?= $errors['message'] ?? ''  ?></p>
         </div>
         <button>Send Message</button>
     </form>




 </main>