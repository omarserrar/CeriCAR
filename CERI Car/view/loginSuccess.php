 <div class="container">
            <div class="col-lg"> 
                  <form method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nom d'utilisateur</label>
                      <input type="text" class="form-control" id="identifiant" placeholder="Entrez votre nom d'utilisateur" name="identifiant" required="required">
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
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                  </form>
            </div>
</div>