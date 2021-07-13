
        @extends('layouts.layouts_profile.master')

        @section('contenu')

            {{--        Style--}}
            <link rel="stylesheet" href="/css/dossier.css">
            {{--        Style--}}
        @if($count ==0)

        <div class="container">
            <div class="title">Votre Dossier</div>
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <div class="content">
                <form action="{{route("student_dossier")}}" method="post" enctype="multipart/form-data" >
                    @csrf
        {{--            info bac--}}
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details"><h3 class="bac">Baccalauriat :</h3>
                            </span>
                        </div>
                        <div class="input-box">
                        </div>
                        <div class="input-box">
                            <span class="details">Annee baccalauriat</span>
                            <input id="Annee_bac" type="text" class="form-control @error('Annee_bac') is-invalid @enderror"
                                   name="Annee_bac"  required >

                            @error('Annee_bac')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="input-box">
                            <span class="details">Baccalauriat </span>
                            <select id="bac" name="bac" class="custom-select form-select" style="margin-top: 1px" >
                                <option  ></option>
                                <option value="Informatique">Informatique</option>
                                <option value="Mathematique">Mathematique</option>
                                <option value="Science">Science</option>
                                <option value="Lettre">Lettre</option>
                                <option value="Economie et gestion">Economie et gestion</option>
                                <option value="Autre">Autre</option>

                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Moyenne baccalauriat</span>
                            <input id="moyenne_bac" type="text" class="form-control @error('moyenne_bac') is-invalid
                            @enderror" name="moyenne_bac"   required  autofocus>
                            @error('moyenne_bac')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">session baccalauriat </span>
                            <select id="session_bac" name="session_bac" class="custom-select form-select" style="margin-top: 1px" >
                                <option ></option>
                                <option value="principale">Principale</option>
                                <option value="controle">Controle</option>

                            </select>
                        </div>
                     <div>   <span>Mention baccalauriat</span>
                        <select  name="mention_bac"  class="form-select" >
                            <option  disabled="true" selected="true">--</option>


                            <option value="passable">Passable</option>
                            <option value="Assez bien">Assez bien</option>
                            <option value="Bien">Bien</option>
                            <option value="très bien">très bien</option>

                        </select>
                     </div>
                        <div class="input-box">
                            <span class="details">Charger votre certificat de succee de baccalauriat </span>
                            <input id="certificat_succee_bac" style=" padding:2%" type="file" class="form-control @error('certificat_succee_bac') is-invalid
                    @enderror" name="certificat_succee_bac" required  autofocus>
                            @error('certificat_succee_bac')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details"><h3 class="infor">Diplome:</h3>
                            </span>
                        </div>
                        <div class="input-box"></div>
        {{--    info diplome--}}
                        <div class="input-box">
                            <span class="details">Nature de diplome </span>
                            <select id="nature_diplome" name="nature_diplome" class="custom-select form-select" style="margin-top: 1px" >
                                <option  disabled="true" selected="true">--</option>
                                <option value="licence applique">licence applique</option>
                                <option value="licence fondamentale">licence fondamentale</option>
                                <option value="maitrise">maîtrise</option>
                            </select>
                        </div>




                        <div class="input-box">
                            <span class="details">Nom de diplome</span>
                            <input id="nom_diplome" type="text" class="form-control @error('nom_diplome') is-invalid @enderror"
                                   name="nom_diplome"  required >

                            @error('nom_diplome')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>






                        <div class="input-box">
                            <span class="details">Date d'obtention de Diplome </span>
                            <div class="col-md-12 form-group">
                                <input type="date" id="start" value="2000-01-01" min="1980-01-01" max="2021-12-31"
                                       style=" width: inherit;"  id="date_diplome"  class="form-control
                                @error('date_diplome') is-invalid @enderror" name="date_diplome"  required  autofocus>

                                @error('date_diplome')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="input-box">
                            <span class="details">Charger votre diplome ici: </span>
                            <input id="img_diplome" style=" padding:2%" type="file" class="form-control @error('img_diplome') is-invalid
                    @enderror" name="img_diplome" required  autofocus>
                            @error('img_diplome')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>





                        <div class="input-box">
                            <span class="details"><h3 class="reo">Vous Etes Orienté ? </h3>
                            </span>
                        </div>
                        <div class="input-box">

                        </div>
        {{--informations supplimentaire--}}
                        <div class="input-box">
                            <span class="details">Vous etes réorienté !</span>
                            <select id="reo" name="reo" class="custom-select  form-select" style="margin-top: 1px">
                                <option  disabled="true" selected="true">--</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>

                            </select>

                        </div>
                        <div class="input-box">
                            <span class="details">Image de reo </span>
                            <input id="img_reo" style=" padding:2%" type="file" class="form-control @error('img_reo') is-invalid
                    @enderror" name="img_reo" >
                            @error('img_reo')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="input-box">
                            <span class="details"><h3 class="cin"> Carte Identité National :</h3>
                            </span>
                        </div>
                        <div class="input-box">

                        </div>
                        <div class="cin-info">
                            <p>
                                <span style="color:red;font-weight:bold"> Important ! :</span> <br>
                            <ol>
                                <li>
                                    S'il vous plait il faut scannée votre Carte D'identité nationale ou bien Votre Passport
                                    avec les deux faces .
                                </li>
                            </ol>
                            </p>
                        </div>

                        {{-- CIN image double face --}}
                        <div class="input-box">
                            <span class="details">Charger votre CIN ou Passport (face 1) </span>
                            <input id="img_cin_face1" style=" padding:2%" type="file" class="form-control @error('img_cin_face1') is-invalid
                    @enderror" name="img_cin_face1" required  autofocus>
                            @error('img_cin_face1')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span class="details">Charger votre CIN ou Passport (face 2) </span>
                            <input id="img_cin_face2" style=" padding:2%" type="file" class="form-control @error('img_cin_face2') is-invalid
                    @enderror" name="img_cin_face2"  autofocus>
                            @error('img_cin_face1')
                            <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- CIN image double face --}}



                    </div>

                    <div class="button">
                        <input type="submit" value="Enregistrer">
                    </div>
                </form>
                <div class="securite">
                <p>
                    <span style="color:red;font-weight:bold"> Important ! :</span> <br>
                <ol>
                    <li>Tout dossier incomplet ou toute information préalablement fournie à distance non-conforme ou erronée
                        entraîne l’annulation systématique de la candidature.
                    </li>
                    <li>Toute candidature déposée après le délai ci-dessous indiqué ne sera pas prise en compte.</li>
                    <li><span style="color:red;font-weight:bold">N'est toléré qu'un seul redoublement.</span></li>
                    <li><span style="color:red;font-weight:bold">Tout candidat a le droit de postuler à un Mastère de recherche et un Mastère Professionnel.</span>
                    </li>
                    <li>La liste des candidats retenus par la commission sera mise en ligne sur le site de l'ISG.</li>
                    <li>Imprimer votre justificatif de pré-inscription. Il sera nécessaire d'inclure ce justificatif dans le
                        dossier de candidature des étudiants qui seront pré-sélectionnés.
                    </li>
                    <li>les étudiants qui seront pré-sélectionnés sur la base des données introduites en ligne auront à
                        fournir/envoyer leurs documents papier et seront invités à des entretiens sur la base desquels la liste
                        finale des étudiants admis sera établie
                    </li>
                    <li>Le dernier delai de dépôt des candidatures pour les Mastères fixé au 17/09/2021.</li>
                </ol>
                </p>
                </div>
            </div>
        </div>

        @else

            <div class="container">
                <div class="title">Votre Dossier</div>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                <div class="content">
                    <form action="{{route("modifier_dossier")}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        {{--            info bac--}}
                        <div class="user-details">
                            <div class="input-box">
                            <span class="details"><h3 class="bac">Baccalauriat :</h3>
                            </span>
                            </div>
                            <div class="input-box">
                            </div>
                            <div class="input-box">
                                <span class="details">Annee baccalauriat</span>
                                <input id="Annee_bac" type="text" class="form-control @error('Annee_bac') is-invalid @enderror"
                                       name="Annee_bac"  required value="{{$dossier->Annee_bac}}">

                                @error('Annee_bac')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="input-box">
                                <span class="details">Baccalauriat </span>
                                <select id="bac" name="bac" class="custom-select form-select" style="margin-top: 1px" >
                                    <option  value="{{$dossier->bac}}">{{$dossier->bac}}</option>
                                    <option value="Informatique">Informatique</option>
                                    <option value="Mathematique">Mathematique</option>
                                    <option value="Science">Science</option>
                                    <option value="Lettre">Lettre</option>
                                    <option value="Economie et gestion">Economie et gestion</option>
                                    <option value="Autre">Autre</option>

                                </select>
                            </div>

                            <div class="input-box">
                                <span class="details">Moyenne baccalauriat</span>
                                <input id="moyenne_bac" type="text" class="form-control @error('moyenne_bac') is-invalid
                            @enderror" name="moyenne_bac"   required  value="{{$dossier->moyenne_bac}}">
                                @error('moyenne_bac')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <span class="details">session baccalauriat </span>
                                <select id="session_bac" name="session_bac" class="custom-select form-select" style="margin-top: 1px" >
                                    <option value="{{$dossier->session_bac}}">{{$dossier->session_bac}}</option>
                                    <option value="principale">Principale</option>
                                    <option value="controle">Controle</option>

                                </select>
                            </div>
                            <div>   <span>Mention baccalauriat</span>
                                <select  name="mention_bac"  class="form-select" >
                                    <option  disabled="true" value="{{$dossier->mention_bac}}" selected="true">-{{$dossier->mention_bac}}-</option>


                                    <option value="passable">Passable</option>
                                    <option value="Assez bien">Assez bien</option>
                                    <option value="Bien">Bien</option>
                                    <option value="très bien">très bien</option>

                                </select>
                            </div>
                            <div class="input-box">
                                <span class="details">Charger votre certificat de succee de baccalauriat </span>
                                <input id="certificat_succee_bac" style=" padding:2%" type="file" class="form-control" name="certificat_succee_bac" required  autofocus>

                            </div>
                            <div class="input-box">
                            <span class="details"><h3 class="infor">Diplome:</h3>
                            </span>
                            </div>
                            <div class="input-box"></div>
                            {{--    info diplome--}}
                            <div class="input-box">
                                <span class="details">Nature de diplome </span>
                                <select id="nature_diplome" name="nature_diplome" class="custom-select form-select" style="margin-top: 1px" >
                                    <option  disabled="true" value="{{$dossier->nature_diplome}}" selected="true">-{{$dossier->nature_diplome}}-</option>
                                    <option value="licence applique">licence applique</option>
                                    <option value="licence fondamentale">licence fondamentale</option>
                                    <option value="maitrise">maîtrise</option>
                                </select>
                            </div>




                            <div class="input-box">
                                <span class="details">Nom de diplome</span>
                                <input id="nom_diplome" type="text" class="form-control @error('nom_diplome') is-invalid @enderror"
                                       name="nom_diplome"  required value="{{$dossier->nom_diplome}}" >

                                @error('nom_diplome')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="input-box">
                                <span class="details">Date d'obtention de Diplome </span>
                                <div class="col-md-12 form-group">
                                    <input type="date" id="start" value="2000-01-01" min="1980-01-01" max="2021-12-31"
                                           style=" width: inherit;"  id="date_diplome"  class="form-control
                                @error('date_diplome') is-invalid @enderror" name="date_diplome"  required  value="{{$dossier->date_diplome}}">

                                    @error('date_diplome')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="input-box">
                                <span class="details">Charger votre diplome ici: </span>
                                <input id="img_diplome" style=" padding:2%" type="file" class="form-control " name="img_diplome" required  autofocus>

                            </div>





                            <div class="input-box">
                            <span class="details "><h3 class="reo">Vous Etes Orienté ? </h3>
                            </span>
                            </div>
                            <div class="input-box">

                            </div>
                            {{--informations supplimentaire--}}
                            <div class="input-box">
                                <span class="details">Vous etes réorienté !</span>
                                <select id="reo" name="reo" class="custom-select  form-select" style="margin-top: 1px">
                                    <option  disabled="true" value="{{$dossier->reo}}" selected="true">-{{$dossier->reo}}-</option>
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>

                                </select>

                            </div>
                            <div class="input-box">
                                <span class="details">Image de reo </span>
                                <input id="img_reo" style=" padding:2%" type="file" class="form-control"  name="img_reo" >

                            </div>


                            <div class="input-box">
                            <span class="details"><h3 class="cin"> Carte Identité National :</h3>
                            </span>
                            </div>
                            <div class="input-box">

                            </div>
                            <div class="cin-info">
                                <p>
                                    <span style="color:red;font-weight:bold"> Important ! :</span> <br>
                                <ol>
                                    <li>
                                        S'il vous plait il faut scannée votre Carte D'identité nationale ou bien Votre Passport
                                        avec les deux faces .
                                    </li>
                                </ol>
                                </p>
                            </div>

                            {{-- CIN image double face --}}
                            <div class="input-box">
                                <span class="details">Charger votre CIN ou Passport (face 1) </span>
                                <input id="img_cin_face1" style=" padding:2%" type="file" class="form-control" name="img_cin_face1" required  autofocus>

                            </div>
                            <div class="input-box">
                                <span class="details">Charger votre CIN ou Passport (face 2) </span>
                                <input id="img_cin_face2" style=" padding:2%" type="file" class="form-control"  name="img_cin_face2"  autofocus>
                            </div>
                            {{-- CIN image double face --}}
                        </div>

                        <div class="button">
                            <input type="submit" value="Enregistrer">
                        </div>
                    </form>
                    <div class="securite">
                        <p>
                            <span style="color:red;font-weight:bold"> Important ! :</span> <br>
                        <ol>
                            <li>Tout dossier incomplet ou toute information préalablement fournie à distance non-conforme ou erronée
                                entraîne l’annulation systématique de la candidature.
                            </li>
                            <li>Toute candidature déposée après le délai ci-dessous indiqué ne sera pas prise en compte.</li>
                            <li><span style="color:red;font-weight:bold">N'est toléré qu'un seul redoublement.</span></li>
                            <li><span style="color:red;font-weight:bold">Tout candidat a le droit de postuler à un Mastère de recherche et un Mastère Professionnel.</span>
                            </li>
                            <li>La liste des candidats retenus par la commission sera mise en ligne sur le site de l'ISG.</li>
                            <li>Imprimer votre justificatif de pré-inscription. Il sera nécessaire d'inclure ce justificatif dans le
                                dossier de candidature des étudiants qui seront pré-sélectionnés.
                            </li>
                            <li>les étudiants qui seront pré-sélectionnés sur la base des données introduites en ligne auront à
                                fournir/envoyer leurs documents papier et seront invités à des entretiens sur la base desquels la liste
                                finale des étudiants admis sera établie
                            </li>
                            <li>Le dernier delai de dépôt des candidatures pour les Mastères fixé au 17/09/2021.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>
        @endif
        @endsection
