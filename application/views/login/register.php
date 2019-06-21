<html>
            <head>
                <title>Oglasnik</title>
            </head>
            <body>
                <h1><a href="<?php echo URL ?>">Oglasnik</a></h1>
                <h2>Registracija novog korisnika</h2>
                <form method="post" action="<?php echo URL ?>/login/newUser">
                    <p>Ime: <input type="text" name="ime" placeholder="Ime"></p>
                    <p>Prezime: <input type="text" name="prezime" placeholder="Prezime"></p>
                    <p>Email: <input type="email" name="email" placeholder="Upisi svoj email"></p>
                    <select name="zupanija">
                        <option value="null">Odaberi zupaniju</option>
                        <?php
                        foreach($zupanije as $zupanija) {
                            echo '<option value="' . $zupanija->id_zupanija . '">' . $zupanija->naziv . '</option>';
                        }
                        ?>
                    </select>
                    <p>Broj telefona: <input type="tel" name="tel" placeholder="Broj telefona"></p>
                    <p>Lozinka: <input type="password" name="pass"></p>
                    <p>Ponovi lozinku: <input type="password" name="pass_check"></p>
                    <p><input type="submit" name="submit_register" value="Registriraj se"></p>
                </form>
                <p><a href="<?php echo URL ?>/login">Prijava</a></p>
            </body>
        </html>