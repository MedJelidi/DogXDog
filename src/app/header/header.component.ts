import {Component, OnInit} from '@angular/core';
import {AuthService} from '../services/auth.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  isSessionID;
  userID;
  loading = true;
  constructor(private authService: AuthService,
              private router: Router) { }

  ngOnInit(): void {
    this.authService.isConnected().subscribe(response => {
      this.authService.isSessionID.next(response[0]);
      this.authService.userID.next(response[1]);
      this.authService.userID
        .subscribe(userID => {
          this.userID = userID;
        });
      this.authService.isSessionID
        .subscribe(data => {
          this.isSessionID = data;
          this.loading = false;
        });
    });
  }

  onLogout(): void {
    this.authService.logOut().subscribe(() => {
    }, () => {
      this.authService.isSessionID.next(false);
      this.router.navigate(['']).then();
    });
  }

}
