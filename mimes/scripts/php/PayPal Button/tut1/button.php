<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input type="hidden" name="add" value="1">
                  <input type="hidden" name="cmd" value="_cart">
                  <input type="hidden" name="business" value="Chris-Bornemann@web.de">
                  <input type="hidden" name="item_name" value="<?php if ($dauer != "") {echo"AutoFeedback.de - Premium $dauer Monat(e) (Benutzer: $user)";} ?>">
                  <input type="hidden" name="amount" value="<?php echo "$price"; ?>">
                  <input type="hidden" name="no_shipping" value="2">
                  <input type="hidden" name="no_note" value="1">
                  <input type="hidden" name="currency_code" value="EUR">
                  <input type="hidden" name="lc" value="DE">
                  <input type="hidden" name="bn" value="PP-ShopCartBF"> 
                  <input type="submit" value="Zahlen" tabindex="1" class="button">&nbsp;<input type="button" name="abbrechen" value="Abbrechen" onClick="JavaScript:self.close()" tabindex="2" class="button">
               </form>