import {Component, Input, OnInit} from '@angular/core';
import {Router} from '@angular/router';

@Component({
  selector: 'app-dog',
  templateUrl: './dog.component.html',
  styleUrls: ['./dog.component.css']
})
export class DogComponent implements OnInit {

  @Input() id;
  @Input() breed;
  @Input() image;
  @Input() name;
  constructor(private router: Router) { }

  ngOnInit(): void {
  }

  onDetails(): void {
    this.router.navigate(['/dogs/' + this.id]).then();
  }

}
