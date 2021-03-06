 <div class="container">
            <div class="col-lg"> 
              <?php if($context->success) { ?>
              <div class="alert alert-success" role="alert">
                Votre compte a été enregistré veuillez <a href="?action=login">vous connecter</a>
              </div>
            <?php } ?>
                  <form method="POST">
                    <input type="hidden" name="action" value="register">
                    <div class="form-row">
                      <div class="col">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" class="form-control" placeholder="Entrez votre nom" name="prenom" required="required">
                      </div>
                      <div class="col">
                        <label for="exampleInputEmail1">Prenom</label>
                        <input type="text" class="form-control" placeholder="Entrez votre prenom" name="nom" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom d'utilisateur</label>
                      <input type="text" class="form-control" id="identifiant" placeholder="Choisissez un nom d'utilisateur" name="identifiant" required="required">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mot de passe</label>
                          <div class="input-group">
                                  <input type="password" name="password" id="password" class="form-control" required="required" minlength="8">

                                  <div class="input-group-append">
                                    <span class="input-group-text hideshow">               
                                      <i class="fa fa-eye"></i>     
                                    </span>       
                                  </div>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">Minimum 8 caractère.</small> 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
</div>