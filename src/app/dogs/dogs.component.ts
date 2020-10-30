import { Component, OnInit } from '@angular/core';
import {DogsService} from '../services/dogs.service';
import {Dog} from '../models/Dog.model';

@Component({
  selector: 'app-dogs',
  templateUrl: './dogs.component.html',
  styleUrls: ['./dogs.component.css']
})
export class DogsComponent implements OnInit {

  dogs: Dog[] = [];
  constructor(private dogService: DogsService) { }

  ngOnInit(): void {
    this.dogService.getDogs()
      .subscribe(dogs => {
        this.dogs = dogs;
      });
  }

}
