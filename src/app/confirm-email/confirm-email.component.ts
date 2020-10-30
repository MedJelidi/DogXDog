import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {AuthService} from '../services/auth.service';

@Component({
  selector: 'app-confirm-email',
  templateUrl: './confirm-email.component.html',
  styleUrls: ['./confirm-email.component.css']
})
export class ConfirmEmailComponent implements OnInit {

  result;
  constructor(private route: ActivatedRoute,
              private authService: AuthService) { }

  ngOnInit(): void {
    const fullToken = this.route.snapshot.params.token;
    const splitToken = fullToken.split(/_(.+)/);
    // console.log(splitToken);
    const username = splitToken[0];
    this.authService.verifyEmail(username, fullToken)
      .subscribe(result => this.result = result);
  }

}
