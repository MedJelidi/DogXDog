import {Component, OnInit, ViewChild} from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {AuthService} from '../services/auth.service';
import {User} from '../models/User.model';
import {FormBuilder, FormGroup} from '@angular/forms';
import {NgxSpinnerService} from 'ngx-spinner';
import {DogsService} from '../services/dogs.service';
import {FormService} from '../services/form.service';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {

  id;
  user: User;
  loading = true;
  dogs;
  canEdit = false;
  userForm: FormGroup;
  dogForm: FormGroup;
  usedPhone = false;
  usedUsername = false;
  errorNet = false;
  submitted = false;
  submittedDog = false;
  changedInput = false;
  incorrectPassword = false;
  changePassword = false;
  finalPassword;
  @ViewChild('closeButton') closeButton;
  constructor(private route: ActivatedRoute,
              private authService: AuthService,
              private formBuilder: FormBuilder,
              private spinner: NgxSpinnerService,
              private dogService: DogsService,
              private formService: FormService) { }

  ngOnInit(): void {
    this.id = this.route.snapshot.params.id;
    this.authService.getUserByID(this.id)
      .subscribe(user => {
        console.log(user);
        this.user = user;
        this.dogs = user.dogs;
        this.authService.isConnected().subscribe(response => {
          this.userForm = this.formService.initEditUserForm(user);
          this.dogForm = this.formService.initAddDogForm();
          if (response[1]) {
            if (this.id === response[1].toString()) {
              this.canEdit = true;
            }
            console.log(this.canEdit);
          }
          this.loading = false;
        }, () => {
          this.loading = false;
        });
      });
  }

  // tslint:disable-next-line:typedef
  get f() { return this.userForm.controls; }

  // tslint:disable-next-line:typedef
  get df() { return this.dogForm.controls; }

  onChange(): void {
    this.changedInput = true;
  }

  onChangePassword(): void {
    this.changePassword = true;
  }

  onEdit(): void {
    this.submitted = true;
    if (this.userForm.invalid && this.userForm.value.newPassword) {
      return;
    }
    this.usedPhone = false;
    this.usedUsername = false;
    this.errorNet = false;
    this.incorrectPassword = false;
    const formEditValue = this.userForm.value;
    const email = formEditValue.email;
    const username = formEditValue.username;
    const phone = formEditValue.phone;
    const location = formEditValue.location;
    const password = formEditValue.password;
    const newPassword = formEditValue.newPassword;

    this.authService.isValidPassword(password)
      .subscribe(truePassword => {
        if (this.changePassword) {
          if (!truePassword) {
            this.incorrectPassword = true;
            return;
          }
          this.finalPassword = newPassword;
        } else {
          if (!truePassword) {
            this.incorrectPassword = true;
            return;
          }
          this.finalPassword = password;
        }

        const socials = [];
        socials[0] = formEditValue.facebook;
        socials[1] = formEditValue.instagram;
        socials[2] = formEditValue.twitter;

        this.spinner.show();
        this.authService.editUser(this.user.id, email, this.finalPassword, username, phone, this.user.image, socials, location)
          .subscribe(data => {
            console.log(data);
            this.spinner.hide();
          }, (error) => {
            if (error.error.detail.includes('exception')) {
              this.usedPhone = true;
              return;
            }
            if (error.error.detail.includes('username')) {
              this.usedUsername = true;
              return;
            }
            this.errorNet = true;
            this.spinner.hide();
          });
      });
  }

  onAddDog(): void {
    console.log('yes');
    this.submittedDog = true;
    if (this.dogForm.invalid) {
      return;
    }
    this.errorNet = false;
    const formDogValue = this.dogForm.value;
    const name = formDogValue.name;
    const breed = formDogValue.breed;
    const description = formDogValue.description;
    const age = formDogValue.age;
    const ready = formDogValue.ready === '1';
    const gender = formDogValue.gender;
    const location = formDogValue.location;

    this.spinner.show();
    this.dogService.addDog(breed, 'https://lh3.googleusercontent.com/proxy/RyX3M2cScT0mGCon26kULNtn49HZSR-M8dIEgqo_F7PH3APrsTJz-hXA_-3ODaT7wY1Nt8WWD3han9iQs6dzuzx2KSZSwqBdirzv6nnkN8-gV0WfXk5q27Jpw1wuOwDaa6qZgImbsKMp2T8CPjvqlWisTZq3xPmu_1_ytSr_uMNwLrI_DLf0XS6J4A'
      , description, '/api/users/' + this.id, +age, ready, name, gender, location)
      .subscribe(data => {
        console.log(data);
        this.closeButton.nativeElement.click();
        this.dogs.push(data);
        this.spinner.hide();
        }, () => {
        this.errorNet = true;
        this.spinner.hide();
      });
  }
}

