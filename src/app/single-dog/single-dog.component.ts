import { Component, OnInit } from '@angular/core';
import {DogsService} from '../services/dogs.service';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-single-dog',
  templateUrl: './single-dog.component.html',
  styleUrls: ['./single-dog.component.css']
})
export class SingleDogComponent implements OnInit {

  id;
  dog;
  loading = true;
  breed;
  image;
  name;
  description;
  location;
  ready;
  owner;
  constructor(private dogService: DogsService,
              private route: ActivatedRoute,
              private router: Router) { }

  ngOnInit(): void {
    this.id = this.route.snapshot.params.id;
    this.dog = this.dogService.getDog(this.id)
      .subscribe(dog => {
        this.breed = dog.breed;
        this.image = dog.image;
        this.description = dog.description;
        this.location = dog.location;
        this.ready = dog.ready;
        this.owner = dog.owner;
        this.loading = false;
      });
  }

  onUser(): void {
    this.router.navigate(['/user/' + this.owner.id]).then();
  }

}
