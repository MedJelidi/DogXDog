import { Injectable } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';

@Injectable()
export class FormService {
  constructor(private formBuilder: FormBuilder) {
  }

  initEditUserForm(user): FormGroup {
    return this.formBuilder.group(
      {
        password: ['', Validators.required],
        username: [user.username, [Validators.required, Validators.minLength(3)]],
        phone: [user.phone, [Validators.required, Validators.pattern('^[0-9]*$'), Validators.minLength(8), Validators.maxLength(8)]],
        facebook: [typeof(user.socials) === 'undefined' ? '' : user.socials[0]],
        instagram: [typeof(user.socials) === 'undefined' ? '' : user.socials[1]],
        twitter: [typeof(user.socials) === 'undefined' ? '' : user.socials[2]],
        newPassword: [''],
        location: [user.location]
      }
    );
  }

  initAddDogForm(): FormGroup {
    return this.formBuilder.group(
      {
        breed: ['', Validators.required],
        description: ['', Validators.required],
        age: ['', [Validators.required, Validators.pattern('^[0-9]*$'), Validators.maxLength(2)]],
        ready: ['', Validators.required],
        name: ['', Validators.required],
        gender: ['', Validators.required],
        location: ['']
      }
    );
  }

}
