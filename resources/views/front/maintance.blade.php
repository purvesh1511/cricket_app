<!-- main body -->
<style>
    /* Basic Reset */
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        color: #333;
        text-align: center;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h1 {
        font-size: 2.5rem;
        color: #444;
    }

    p {
        font-size: 1.2rem;
        color: #666;
        margin: 10px 0;
    }

    .logo {
        max-width: 150px;
        margin-bottom: 20px;
    }

    .container {
        padding: 20px;
        max-width: 600px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        border-radius: 8px;
    }

    .spinner {
        margin: 20px auto;
        width: 50px;
        height: 50px;
        border: 5px solid #ccc;
        border-top: 5px solid #444;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    footer {
        margin-top: 20px;
        font-size: 0.9rem;
        color: #aaa;
    }
</style>
<div class="main-banner"></div>


<section class="our-categories">
    <div class="container">
        <h1>We'll Be Back Soon!</h1>
        <p>Our website is currently undergoing scheduled maintenance. We appreciate your patience and apologize for any inconvenience caused.</p>
        <div class="spinner"></div>
        <p>Thank you for your understanding!</p>
        <footer>&copy; <?php echo date('y') ?> Your Website. All Rights Reserved.</footer>
    </div>
</section>