<h1>Contact</h1>
                <p>Neem contact met ons op door het onderstaande formulier in te vullen. Alle velden zijn verplicht.</p>
                <form action="index.php?page=contact-send.php" method="post">
                    <label>Uw naam</label>
                    <input type="text" name="name" placeholder="Type uw naam" autofocus required>

                    <label>Email</label>
                    <input type="text" name="email" type="email" placeholder="Type uw email" required>

                    <label>Bericht</label>
                    <textarea name="message" placeholder="Type uw bericht" required></textarea>

                    <input id="button" name="submit" type="submit" value="Verstuur bericht">
                </form>
