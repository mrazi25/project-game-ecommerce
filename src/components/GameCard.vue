<template>
  <div class="container">
    <div class="card mb-3" style="max-width: 1000px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../assets/GTAV.jpg" class="img-fluid rounded-start" alt="GTA-V">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>

    <div>
      <b-card no-body class="overflow-hidden" id="cardgame">
        <b-row no-gutters>
          <b-col md="6">
            <img src="../assets/GTAV.jpg" class="card-img-top" />
          </b-col>
          <b-col md="6">
            <b-card-body title="GTA V">
              <b-card-text>
                Grand Theft Auto V for PC offers players the option to explore
                the award-winning world of Los Santos and Blaine County in
                resolutions of up to 4k and beyond, as well as the chance to
                experience the game running at 60 frames per second. t as a
                natural lead-in to additional content. This content is a little
                bit longer.
              </b-card-text>
              <a href="#" class="btn btn-primary">Buy Now!</a>
            </b-card-body>
          </b-col>
        </b-row>
      </b-card>
    </div>
    <div class="flex-container">
    <div class="game-card-coll d-flex justify-content-center">
      <div class="card text-center" style="width: 18rem">
        <img src="../assets/EFootball23.png" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">GTA V</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="#" class="btn btn-primary">Buy Now!</a>
        </div>
      </div>
    </div>
    <div class="game-card-coll d-flex justify-content-center">
      <div class="card text-center" style="width: 18rem">
        <img src="../assets/valorant.jpg" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">Valorant</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="#" class="btn btn-primary">Buy Now!</a>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "GameCard",
};
</script>

<style>
#cardgame {
  display: block;
  width: 700px;
}
.flex-container {
  display: flex;
  background-color: DodgerBlue;
  padding-top: 20px;
  padding-bottom: 20px;
  margin: 20px;
}
.game-card-coll {
  padding: 20px;
}
</style>