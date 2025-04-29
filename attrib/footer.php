<style>
  footer {
    background: #ffffff;
    padding: 40px 20px 20px;
    font-size: 14px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
  }

  .footercolumns {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: space-between;
  }

  .col {
    flex: 1;
    min-width: 200px;
  }

  .logo {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #ffffff;
    border: 2px solid #007bff;
    color: #007bff;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    font-weight: bold;
  }

  footer a {
    color: #007bff;
    text-decoration: none;
    display: inline-block;
    margin-bottom: 5px;
    transition: color 0.2s ease-in-out;
  }

  footer a:hover {
    text-decoration: underline;
    color: #0056b3;
  }

  .footerbot {
    text-align: center;
    margin-top: 30px;
    border-top: 1px solid #dee2e6;
    padding-top: 15px;
    font-size: 13px;
    color: #6c757d;
  }

  .footerbot a {
    color: #007bff;
    margin: 0 5px;
  }

  .footerbot a:hover {
    color: #0056b3;
  }

  .footercolumns p {
    margin-bottom: 8px;
    color: #212529;
  }

  .footercolumns strong {
    color: #007bff;
  }

  .location img {
    width: 100%;
    max-width: 150px;
    border-radius: 8px;
    border: 1px solid #dee2e6;
  }

  @media (max-width: 768px) {
    .footercolumns {
      flex-direction: column;
    }
  }
</style>

<footer>
  <div class="footercolumns container">
    <div class="col">
      <div class="logo">LOGO</div>
      <p><strong>BARANGAY NAME HEALTH CENTER</strong></p>
      <p>Phone: +63 123 123 1234</p>
      <p>Email: <a href="mailto:brgname@gmail.com">brgname@gmail.com</a></p>
      <p>Address: # Name St., Brgy. Name, Baguio City</p>
    </div>
    <div class="col">
      <p><strong>Quick Links</strong></p>
      <p><a href="#">Home</a></p> 
      <p><a href="#">Services</a></p>
      <p><a href="#">Make an Appointment</a></p>
      <p><a href="#">Blog</a></p>
      <p><a href="#">About</a></p>
      <p><a href="#">Contact Us</a></p>
    </div>
    <div class="col">
      <p><strong>Support</strong></p>
      <p><a href="#">Contact Us</a></p>
      <p><a href="#">FAQ</a></p>
      <p><a href="#">How it Works</a></p>
    </div>
    <div class="col">
      <p><strong>Location</strong></p>
      <div class="location">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d676.4935046747587!2d120.60591970966559!3d16.4337039031136!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3391a3efbcac4f5d%3A0xe00bee362c38638e!2sAmbiong%20Barangay%20Health%20Station!5e0!3m2!1sen!2sph!4v1745920836582!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>

  <div class="footerbot">
    <a href="#">TEAM NAME</a> |
    <a href="#">Privacy Policy</a> |
    <a href="#">Terms & Conditions</a> |
    <a href="#">License Agreements</a>
  </div>
</footer>
