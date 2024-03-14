<script setup>
import AdminNavComp from '../../components/AdminNavComp.vue'
import AdminFooterComp from '../../components/AdminFooterComp.vue'
</script>

<template>
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__heading-container">

            <!-- Page Heding -->
              <div class="page__heading">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                      <a href="#"
                        ><i class="material-icons icon-20pt">home</i></a
                      >
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dashboard
                    </li>
                  </ol>
                </nav>

                <h1 class="m-0">Dashboard</h1>
              </div>
              <!-- end heading -->

            </div>

            <!-- Content -->
            <div class="container page__container">
                <div class="row card-group-row">
                  <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                      <div
                        class="card-body-x-lg card-body d-flex flex-row align-items-center"
                      >
                        <div class="flex">
                          <div class="card-header__title text-muted mb-2 d-flex">
                            Total User
                          </div>
                          <span class="h4 m-0"
                            >192 <small class="text-muted">User</small></span
                          >
                        </div>
                        <div>
                          <i class="fa fa-user icon-muted icon-40pt ml-3"
                            ></i
                          >
                        </div>
                      </div>
                      <div class="progress" style="height: 3px">
                        <div
                          class="progress-bar bg-warning"
                          role="progressbar"
                          style="width: 25%"
                          aria-valuenow="25"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                      <div
                        class="card-body-x-lg card-body d-flex flex-row align-items-center"
                      >
                        <div class="flex">
                          <div class="card-header__title text-muted d-flex mb-2">
                            Total Produk
                          </div>
                          <span class="h4 m-0"
                            >80 <span class="text-muted">Produk</span>
                          </span>
                        </div>
                        <div>
                          <i class="fa fa-box-open icon-muted icon-40pt ml-3"></i>
                        </div>
                      </div>
                      <div class="progress" style="height: 3px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 50%"
                          aria-valuenow="50"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                      <div
                        class="card-body-x-lg card-body d-flex flex-row align-items-center"
                      >
                        <div class="flex">
                          <div class="card-header__title text-muted mb-2">
                            Total Seller
                          </div>
      
                          <div class="d-flex align-items-center">
                            <div class="h4 m-0">130</div>
                            <small class="text-muted">Seller</small>
                          </div>
                        </div>
                        <div>
                          <i class="fa fa-shopping-basket icon-muted icon-40pt ml-3"
                            ></i
                          >
                        </div>
                      </div>
                      <div class="progress" style="height: 3px">
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 50%"
                          aria-valuenow="50"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="card">
                  <div class="card-header">
                    <form class="form-inline">
                      <label class="mr-sm-2" for="inlineFormFilterBy"
                        >Filter by:</label
                      >
                      <input
                        type="text"
                        class="form-control mb-2 mr-sm-2 mb-sm-0"
                        id="inlineFormFilterBy"
                        placeholder="Type a name"
                      />
      
                      <label class="sr-only" for="inlineFormRole">Role</label>
                      <select
                        id="inlineFormRole"
                        class="custom-select mb-2 mr-sm-2 mb-sm-0"
                      >
                        <option value="All Roles">All Roles</option>
                      </select>
      
                      <div
                        class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0"
                      >
                        <input
                          type="checkbox"
                          class="custom-control-input"
                          id="inlineFormPurchase"
                        />
                        <label class="custom-control-label" for="inlineFormPurchase"
                          >Made a Purchase?</label
                        >
                      </div>
                    </form>
                  </div>
      
                  <div
                    class="table-responsive border-bottom"
                    data-toggle="lists"
                    data-lists-values='["js-lists-values-employee-name"]'
                  >
                    <table class="table mb-0 thead-border-top-0">
                      <thead>
                        <tr>
                          <th style="width: 18px">
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-toggle-check-all"
                                data-target="#staff"
                                id="customCheckAll"
                              />
                              <label class="custom-control-label" for="customCheckAll"
                                ><span class="text-hide">Toggle all</span></label
                              >
                            </div>
                          </th>
      
                          <th>Nama Produk</th>
                          <th style="width: 150px">Seller</th>
                          <th style="width: 48px">Kategori</th>
                          <th style="width: 37px">Stock</th>
                          <th style="width: 120px">Status</th>
                          <th style="width: 51px">Link</th>
                          <th style="width: 24px"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="staff">
                        <tr class="selected">
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-check-selected-row"
                                checked=""
                                id="customCheck1_1"
                              />
                              <label class="custom-control-label" for="customCheck1_1"
                                ><span class="text-hide">Check</span></label
                              >
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <div class="avatar avatar-xs mr-2">
                                <img
                                  src=""
                                  alt="Avatar"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                              <div class="media-body">
                                <span class="js-lists-values-employee-name"
                                  >Tahu</span
                                >
                              </div>
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <a href="">Seller 5</a>
                              <a href="#" class="rating-link"
                                ><i class="material-icons ml-2">star</i></a
                              >
                            </div>
                          </td>
      
                          <td>Makanan</td>
                          <td>888</td>
                          <td><span class="badge badge-success">Tersedia</span></td>
                          <td>Tokopedia.com</td>
                          <td>
                            <a href="" class="text-muted"
                              ><i class="material-icons">more_vert</i></a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-check-selected-row"
                                id="customCheck2_1"
                              />
                              <label class="custom-control-label" for="customCheck2_1"
                                ><span class="text-hide">Check</span></label
                              >
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <div class="avatar avatar-xs mr-2">
                                <img
                                  src=""
                                  alt="Avatar"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                              <div class="media-body">
                                <span class="js-lists-values-employee-name"
                                  >Tempe</span
                                >
                              </div>
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <a href="#">Seller 1</a>
                              <a href="#" class="rating-link active"
                                ><i class="material-icons ml-2">star</i></a
                              >
                            </div>
                          </td>
      
                          <td>42</td>
                          <td>118</td>
                          <td><span class="badge badge-success">Tersedia</span></td>
                          <td>tokopedia.com</td>
                          <td>
                            <a href="" class="text-muted"
                              ><i class="material-icons">more_vert</i></a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-check-selected-row"
                                id="customCheck3_1"
                              />
                              <label class="custom-control-label" for="customCheck3_1"
                                ><span class="text-hide">Check</span></label
                              >
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <div class="avatar avatar-xs mr-2">
                                <img
                                  src=""
                                  alt="Avatar"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                              <div class="media-body">
                                <span class="js-lists-values-employee-name"
                                  >Tape</span
                                >
                              </div>
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <a href="">Seller Solo</a>
                              <a
                                href="#"
                                class="rating-link"
                                onclick="document.getElementById('box').classList.toggle('grow');"
                                ><i class="material-icons ml-2">star</i></a
                              >
                            </div>
                          </td>
      
                          <td>Makanan</td>
                          <td><small class="text-muted">0</small></td>
                          <td><span class="badge badge-danger">Habis</span></td>
                          <td>Blibli.com</td>
                          <td>
                            <a href="" class="text-muted"
                              ><i class="material-icons">more_vert</i></a
                            >
                          </td>
                        </tr>
      
                        <tr class="selected">
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-check-selected-row"
                                checked=""
                                id="customCheck1_2"
                              />
                              <label class="custom-control-label" for="customCheck1_2"
                                ><span class="text-hide">Check</span></label
                              >
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <div class="avatar avatar-xs mr-2">
                                <img
                                  src=""
                                  alt="Avatar"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                              <div class="media-body">
                                <span class="js-lists-values-employee-name"
                                  >Bayam</span
                                >
                              </div>
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <a href="">Seller 10</a>
                              <a href="#" class="rating-link"
                                ><i class="material-icons ml-2">star</i></a
                              >
                            </div>
                          </td>
      
                          <td>Sayuran</td>
                          <td><small class="text-muted">0</small></td>
                          <td><span class="badge badge-Danger">Habis</span></td>
                          <td>Shopee</td>
                          <td>
                            <a href="" class="text-muted"
                              ><i class="material-icons">more_vert</i></a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-check-selected-row"
                                id="customCheck2_2"
                              />
                              <label class="custom-control-label" for="customCheck2_2"
                                ><span class="text-hide">Check</span></label
                              >
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <div class="avatar avatar-xs mr-2">
                                <img
                                  src=""
                                  alt="Avatar"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                              <div class="media-body">
                                <span class="js-lists-values-employee-name"
                                  >Tahu</span
                                >
                              </div>
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <a href="#">Seller 20</a>
                              <a href="#" class="rating-link active"
                                ><i class="material-icons ml-2">star</i></a
                              >
                            </div>
                          </td>
      
                          <td>Daging</td>
                          <td><small class="text-muted">0</small></td>
                          <td><span class="badge badge-danger">Habis</span></td>
                          <td>&dollar;1,943</td>
                          <td>
                            <a href="" class="text-muted"
                              ><i class="material-icons">more_vert</i></a
                            >
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-control custom-checkbox">
                              <input
                                type="checkbox"
                                class="custom-control-input js-check-selected-row"
                                id="customCheck3_2"
                              />
                              <label class="custom-control-label" for="customCheck3_2"
                                ><span class="text-hide">Check</span></label
                              >
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <div class="avatar avatar-xs mr-2">
                                <img
                                  src=""
                                  alt="Avatar"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                              <div class="media-body">
                                <span class="js-lists-values-employee-name"
                                  >Singkong</span
                                >
                              </div>
                            </div>
                          </td>
      
                          <td>
                            <div class="media align-items-center">
                              <a href="">Seller 1</a>
                              <a
                                href="#"
                                class="rating-link"
                                onclick="document.getElementById('box').classList.toggle('grow');"
                                ><i class="material-icons ml-2">star</i></a
                              >
                            </div>
                          </td>
      
                          <td>Ubi</td>
                          <td>8</td>
                          <td><span class="badge badge-warning">Tersedia</span></td>
                          <td>blibli</td>
                          <td>
                            <a href="" class="text-muted"
                              ><i class="material-icons">more_vert</i></a
                            >
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
      
                  <div class="card-body text-right">
                    15 <span class="text-muted">of 1,430</span>
                    <a href="#" class="text-muted-light"
                      ><i class="material-icons ml-1">arrow_forward</i></a
                    >
                  </div>
                </div>
              </div>
            <!-- end Content -->

          </div>
</template>
