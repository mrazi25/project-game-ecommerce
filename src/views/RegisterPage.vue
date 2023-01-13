<template>
  <div>
    <div class="container row1">
      <div
        id="carouselExampleAutoplaying"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/gaming.svg" class="d-block w-100" />
          </div>
          <div class="carousel-item">
            <img src="../assets/gaming.svg" class="d-block w-100" />
          </div>
          <div class="carousel-item">
            <img src="../assets/gaming.svg" class="d-block w-100" />
          </div>
        </div>
        <div>
          <h3>REGISTER</h3>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleAutoplaying"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <b-form @submit="onSubmit" @reset="onReset" v-if="show">
        <b-form-group
          id="input-group-1"
          label="Email address:"
          label-for="input-1"
          description="We'll never share your email with anyone else."
        >
          <b-form-input
            id="input-1"
            v-model="form.email"
            type="email"
            placeholder="Enter email"
            required
          ></b-form-input>
        </b-form-group>
        <b-form-group
          id="input-group-2"
          label="Your Password:"
          label-for="input-2"
        >
          <b-form-input
            type="password"
            id="text-password"
            v-model="form.pass"
            aria-describedby="password-help-block"
            required
          ></b-form-input>
          <b-form-text id="password-help-block">
            Your password must be 8-20 characters long, contain letters and
            numbers, and must not contain spaces, special characters, or emoji.
          </b-form-text>
        </b-form-group>

        <b-button id="btn-submit" type="submit" variant="primary"
          >Submit</b-button
        >
        <b-button id="btn-reset" type="reset" variant="danger">Reset</b-button>
      </b-form>
      <div class="hypertext">
        <router-link class="login-button" to="/LoginPage"
          >already have an account, let's log on</router-link
        >
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "RegisterPage",
  data() {
    return {
      listAcc: [],
      form: {
        email: "",
        pass: "",
        jenis_akun: "user",
      },
      show: true,
    };
  },
  async mounted() {
    this.getData();
  },
  methods: {
    getData() {
      axios
        .get("http://localhost/API_JokiE-Commerce/api/data/ListAccount.php")
        .then((response) => {
          this.listAcc = response.data;
        });
    },
    addData(obj) {
      axios
        .post(
          "http://localhost/API_JokiE-Commerce/api/data/CreateAccount.php",
          obj
        )
        .then(() => {
          this.form.email = "";
          this.form.pass = "";
        });
    },
    onSubmit() {
      console.log(this.listAcc)
      if (this.listAcc.length === 0) {
        this.addData(this.form);
        this.$router.push("/LoginPage");
      } else {
        let checkEmail = false;
        for(let i=0; i < this.listAcc.length; i++){
          if(this.listAcc[i].email === this.form.email){
            checkEmail = true;
            break;
          }
        }
        if (checkEmail) {
          alert("email already taken");
        } else {
          this.addData(this.form);
          this.$router.push("/LoginPage");
        }
      }
    },
    onReset(event) {
      event.preventDefault();
      // Reset our form values
      this.form.email = "";
      this.form.pass = "";
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
  },
};
</script>

<style scoped>
.container {
  width: 400px;
  margin-top: 15px;
  border-style: solid;
  border-radius: 5px;
  border-color: rgba(214, 56, 125, 1);
  padding-top: 10px;
  padding-bottom: 20px;
}
h3 {
  margin-top: 20px;
  text-align: center;
}
.hypertext {
  margin-top: 20px;
}
.login-button {
  color: rgba(214, 56, 125, 1);
  margin-top: 15px;
}
.login-button:hover {
  font-weight: bold;
}
#btn-submit {
  text-align: center;
  margin-right: 20px;
}
#btn-reset {
  text-align: center;
  margin-left: 20px;
}
</style>