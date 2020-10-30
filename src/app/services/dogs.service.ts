import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Dog} from '../models/Dog.model';
import {shareReplay} from 'rxjs/operators';

@Injectable()
export class DogsService {
  constructor(private httpClient: HttpClient) {
  }

  getDogs(): Observable<any> {
    return this.httpClient.get<Dog[]>('https://localhost:8000/api/dogs');
  }

  getDog(id): Observable<Dog> {
    return this.httpClient.get<Dog>('https://localhost:8000/api/dogs/' + id);
  }

  addDog(breed, image, description,
         owner, age, ready, name,
         gender, location): Observable<any> {
    return this.httpClient.post<any>('https://localhost:8000/api/dogs', {
      breed,
      image,
      description,
      owner,
      age,
      ready,
      name,
      gender,
      location
    });
  }
}
