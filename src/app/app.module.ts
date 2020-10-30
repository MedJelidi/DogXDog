import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import {RouterModule, Routes} from '@angular/router';
import { HeaderComponent } from './header/header.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { SignUpComponent } from './sign-up/sign-up.component';
import { DogComponent } from './dog/dog.component';
import { DogsComponent } from './dogs/dogs.component';
import {DogsService} from './services/dogs.service';
import {AuthService} from './services/auth.service';
import { CookieService } from 'ngx-cookie-service';
import {HTTP_INTERCEPTORS, HttpClientModule} from '@angular/common/http';
import {HttpRequestInterceptor} from './services/http-request-interceptor.service';
import { SingleDogComponent } from './single-dog/single-dog.component';
import { SignInComponent } from './sign-in/sign-in.component';
import {ReactiveFormsModule} from '@angular/forms';
import {ReverseAuthGuardService} from './services/reverse-auth-guard.service';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import { NgxSpinnerModule } from 'ngx-spinner';
import { UserComponent } from './user/user.component';
import {FormService} from './services/form.service';
import { ConfirmEmailComponent } from './confirm-email/confirm-email.component';
import { ExamComponent } from './exam/exam.component';
import { QuestionComponent } from './question/question.component';
import {ExamService} from './services/exam.service';
import {NgxPaginationModule} from 'ngx-pagination';
import {RequestCacheService} from './services/request-cache.service';
import {CachingInterceptor} from './services/caching-interceptor.service';

const appRoutes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'sign-up', canActivate: [ReverseAuthGuardService], component: SignUpComponent },
  { path: 'sign-in', canActivate: [ReverseAuthGuardService], component: SignInComponent },
  { path: 'dogs', component: DogsComponent },
  { path: 'dogs/:id', component: SingleDogComponent },
  { path: 'user/:id', component: UserComponent },
  { path: 'conf_user/:token', component: ConfirmEmailComponent },
  { path: 'exam/:exam', component: ExamComponent }
];

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    HeaderComponent,
    SignUpComponent,
    DogComponent,
    DogsComponent,
    SingleDogComponent,
    SignInComponent,
    UserComponent,
    ConfirmEmailComponent,
    ExamComponent,
    QuestionComponent
  ],
    imports: [
      BrowserModule,
      HttpClientModule,
      RouterModule.forRoot(appRoutes),
      BrowserModule,
      AppRoutingModule,
      NgbModule,
      ReactiveFormsModule,
      BrowserAnimationsModule,
      MatProgressSpinnerModule,
      NgxSpinnerModule,
      NgxPaginationModule
    ],
  providers: [DogsService,
    AuthService,
    CookieService,
    ReverseAuthGuardService,
    FormService,
    ExamService,
    RequestCacheService,
    [
      {provide: HTTP_INTERCEPTORS, useClass: CachingInterceptor, multi: true },
      {provide: HTTP_INTERCEPTORS, useClass: HttpRequestInterceptor, multi: true }
    ]
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
