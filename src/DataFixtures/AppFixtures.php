<?php

namespace App\DataFixtures;

use App\Entity\Dog;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private $breedList = ['Afghan Hound', 'Bulldog', 'Chihuahua',
        'Dalmatian', 'Eurasier', 'Frenchton', 'Golden Shepherd',
        'Siberian Husky', 'Ibizan Hound', 'Japanese Chin', 'Komondor',
        'Labrador Retriever', 'Mastiff', 'Norwegian Buhund', 'Otterhound',
        'Pug', 'Rottador', 'Saluki', 'Terripoo', 'Vizsla',
        'Whippet', 'Xoloitzcuintli', 'Yorkshire Terrier'
        ];
    private $images = ['https://www.zooplus.co.uk/magazine/wp-content/uploads/2019/01/Afghan-hound-UK-768x512.jpg',
        'https://s3.envato.com/files/143442200/2014_298_002_021.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/27134650/Chihuahua-standing-in-three-quarter-view.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12234026/Dalmatian-On-White-01.jpg',
        'https://dogtime.com/assets/uploads/2019/08/eurasier-dog-breed-pictures-cover.jpg',
        'https://dogtime.com/assets/uploads/2020/01/frenchton-mixed-dog-breed-pictures-cover.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12213218/German-Shepherd-on-White-00.jpg',
        'https://lh3.googleusercontent.com/proxy/wQxKTxcnbmPAfMDB7QlNxfj9oPnVvD9JjC9UY1ulTMfF0ooKHttTPo4LhaYXrt3ffj9J8zyiyjrTH_D9I9Ovyo_kN4edbj7e5mtZAiar8cDBp3tlmnCmuVzw-9V7UMpb448RnBYV5z4egE8',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12232219/Ibizan-Hound-On-White-01.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/29225534/Japanese-Chin-puppy.jpg',
        'https://www.purina.co.uk/sites/g/files/mcldtz2481/files/styles/nppe_breed_selector_500/public/breed_library/komondor.jpg?itok=RutPwHeB',
        'https://www.purina.com.sg/wp-content/uploads/2013/11/LabradorRetrievers_2502.jpeg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12230849/Mastiff-On-White-03.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12230414/Norwegian-Buhund-On-White-01.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12230108/Otterhound-On-White-03.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12225358/Pug-On-White-01.jpg',
        'https://dogtime.com/assets/uploads/2019/11/rottador-mixed-dog-breed-pictures-cover.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/14185322/AKC-121716-139.jpg',
        'https://www.petguide.com/wp-content/uploads/2017/11/terripoo.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12223307/Vizsla-On-White-01.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12223025/Whippet-On-White-01.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/12222734/Xoloitzcuintli-On-White-01.jpg',
        'https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/20183328/Yorkshire-puppy.jpg'
        ];
    private $descriptions = ['The Valley Bulldog is a mixed breed dog–a cross between the Boxer and English Bulldog breeds. Medium in size, active, and loyal, these pups inherited some of the best qualities from both of their parents
Valley Bulldogs also go by the name Bull Boxer. Despite their unfortunate status as a designer breed, you can find these mixed pups in shelters and breed-specific rescues, so remember to adopt! Don’t shop!
These adorable pups make great apartment dogs for active urban dwellers, and they also do well with large families. They can get excessively barky, which can be minimized with early training. If you want an active companion dog who does not require too much exercise, read on to find out if the Valley Bulldog is right for you!',
        'The Bulldog was originally used to drive cattle to market and to compete in a bloody sport called bullbaiting. Today, they’re gentle companions who love kids.

Even though these are purebred dogs, you may find them in the care of shelters or rescue groups. Remember to adopt! Don’t shop if you want to bring a dog home.

A brief walk and a nap on the sofa is just this dog breed‘s speed. Bulldogs can adapt well to apartment life and even make great companions for novice pet parents. They’re affectionate with all members of the family and are fairly low-maintenance pups. Just make sure to keep them out of extreme weather, and also give them enough exercise, as weight gain is a risk with these dogs who are happy to spend most of the day on the couch.',
        'The Chihuahua dog breed‘s charms include their small size, big personality, and variety in coat types and colors. They’re all dog, fully capable of competing in dog sports such as agility and obedience, and are among the top ten watchdogs recommended by experts.

Although these are purebred dogs, you may still find them in shelters and rescues. Remember to adopt! Don’t shop if you want to bring a dog home.

Chihuahuas love nothing more than being with their people — even novice pet parents — and require a minimum of grooming and exercise. They make excellent apartment dogs who’ll get along with the whole family. Just make sure any children who approach know how to play gently with a small dog.',
        'Best known as the star of Disney’s 101 Dalmatians, this sleek and athletic Dalmatian dog breed has a history that goes back several hundred years. They started out as a coach dog but also served in many other capacities, including hunter, firehouse dog, and circus performer.

Even though these are purebred dogs, you may find them in the care of shelters or rescue groups. Remember to adopt! Don’t shop if you want to bring a dog home.

As charming in life as in film, Dalmatians go from gallant to goofy to gallant again in the blink of an eye. They love to be a part of everything their family does. That said, they have high energy levels and need plenty of exercise. If you’re looking for a jogging partner and friend who’ll love you unconditionally, this may be the breed for you!',
        'The Eurasier is a breed of medium-sized dogs of the Spitz type that first came from Germany. These dogs are known to be very smart, loyal, and even-tempered.

Eurasiers can go by many other names such as Eurasian, Eurasian Spitz, Eurasian dog, and most notably, Wolf-Chow. You can find Eurasier dogs in shelters and breed specific rescues, so remember to adopt!

These dogs are very solid watchdogs and pack-oriented, which makes them ideal for those with families and even kids. However, Eurasiers don’t do well when left alone, especially in a room by themselves. They do best when they are part of a family and, when left on their own, can grow anxious and depressed.',
        'The Frenchton is a mixed breed dog — a cross between the Boston Terrier and French Bulldog breeds. Sturdy, sociable, playful, and chill, these pups inherited some of the best qualities from both of their parents.

Frenchtons are also called Frenchbo, Faux Frenchbo, and Froston. Despite their unfortunate status as a designer breed, you can find these pups, in shelters and breed-specific rescues, so remember to adopt. Don’t shop!

These outgoing pups are total charmers. They’re easy traveling companions and could join their families on every adventure. They’re also sweet-natured and love children of all ages.

With plenty of love and some activities, a Frenchton would easily adapt to a small apartment. If you work long hours and would be away from your pup, however, this would not be the right dog for you. But if you work in a place that would allow you to bring your pup with you, this laid-back dog would love to join you and hang out wherever you are.',
        'The Golden Shepherd is a mixed breed dog–a cross between the Golden Retriever and German Shepherd dog breeds. Large, energetic, and loyal, these pups inherited some of the best qualities from both of their parents.

The Golden Shepherd is also called Golden German Shepherd, German Retriever, or just German Shepherd Golden Retriever. Despite their unfortunate status as a designer breed, you can find these mixed-breed dogs in shelters and breed specific rescues, so remember to adopt! Don’t shop!

Golden Shepherds are not a great choice for novice pet owners, but if you’re an experienced dog parent looking for a watch dog and all around family companion, this pup may be for you! Big homes with yards are ideal but not required, as long as they get plenty of exercise. While Golden Shepherds are not excessively barky, they will alert when strangers approach.

These dogs are protective of their loved ones and friendly with people, children, and other dogs. Don’t leave them alone for long periods, though, or else they may become bored and destructive.',
        'The Siberian Husky dog breed has a beautiful, thick coat that comes in a multitude of colors and markings. Their blue or multi-colored eyes and striking facial masks only add to the appeal of this breed, which originated in Siberia.

It is easy to see why many are drawn to the Siberian’s wolf-like looks, but beware because this athletic, intelligent dog can act independently and challenge first-time dog parents. Huskies also put the “H” in Houdini and need a yard with a high fence that goes all the way into the ground to prevent escapes. Giving your Husky enough exercise may prove easier said than done; though, it’ll reduce boredom and unwanted behaviors, like escape attempts.',
        'The Ibizan Hound was originally bred to hunt rabbits and small game on the Balearic island of Ibiza. Today, the Ibizan Hound dog breed is still used in that capacity in Spain and elsewhere. Ibizan Hounds also compete in lure coursing, agility, obedience, conformation, and tracking, in addition to being much-loved family companions.

Even though these are purebred dogs, some may still end up in the care of shelters or rescues. Consider adoption if this is the breed for you.

Despite the breed’s high energy levels, Ibizan Hounds can still fair well in apartment living situations, so long as you meet their exercise needs. Don’t leave them home alone for long hours, though, or you may end up with a bored and destructive pup. So long as they have plenty of walks and playtime, this dog will shower the humans in their life with plenty of affection.',
        'The Japanese Chin dog breed hails from Asia, where they’ve been prized as a companion for more than a thousand years. They were a popular member of Chinese and Japanese imperial courts, and it was in Japan that their distinctive look was developed.

Although these are purebred dogs, you may still find them in shelters and rescues. Remember to adopt! Don’t shop if you want to bring a dog home.

This breed is elegant and dainty, mild-mannered and playful. They adapt well to apartment life and even take to novice pet parents with ease; although, they don’t much care for being left alone at home for long hours. These dogs also have a habit of climbing, and you may be surprised when you find your pooch atop the most unusual high places in the home, surveying their domain. Give your Chin plenty of attention and love, and you’ll have an easygoing, adoring cuddle buddy.',
        'Although the Komondor’s appearance might make you think they were developed to mop floors, this pooch has a long and noble heritage as a flock-guarding dog breed in their native Hungary. They still retain a strong protective instinct and will defend their family and property with their life.

In Hungarian, the plural form of Komondor is Komondorok. Although this is a purebred dog, you may be able to find them in shelters and rescues. So remember to adopt! Don’t shop!

Affectionate with their families, these dogs are intelligent and eager to please. Because they’re so protective, they can make decent watchdogs and will bark if anything is amiss. They aren’t, however, well-suited for apartment life and prefer to have lots of room to run and burn off energy. For a larger home in need of a loving guardian, this may be the dog for the job.',
        'The Labrador Retriever was bred to be both a friendly companion and a useful working dog breed. Historically, they earned their keep as fishermen’s helpers: hauling nets, fetching ropes, and retrieving fish from the chilly North Atlantic.

Today’s Lab is as good-natured and hardworking as their ancestors, and they’re also America’s most popular breed. Modern Labs work as retrievers for hunters, assistance dogs, show competitors, and search and rescue dogs, among other canine jobs.',
        'The Mastiff is one of the most ancient types of dog breeds. Their ancestor, the Molossus, was known 5,000 years ago. Back then, they were ferocious war dogs, very different from the benevolent behemoth that the breed is today.

Mastiffs are sometimes called Old English Mastiffs. Although this is a purebred dog, you may find them in shelters and rescues. Remember to adopt! Don’t shop if this is the breed for you.

Mastiffs make fine companions for anyone who can accommodate their great size and doesn’t mind a little drool slung here and there. Apartment dwellers and first-time dog owners may want to consider another breed. But if you’re looking for a big dog with lots of love to give, this may be the pooch for you!',
        'Intelligent, independent, and eager to please, the Norwegian Buhund dog breed can handle all kinds of dog jobs and sports with ease. They need lots of exercise and attention, and they’re quick learners.

Although these are fairly rare, purebred dogs, you may find them in the care of shelters and rescue groups. Remember to adopt! Don’t shop if you want to bring one of these dogs home.

As you might have guessed from their appearance, Norwegian Buhunds handle cold weather with ease. They’re also highly affectionate to the humans in their lives, even with kids. This pup will happily join in for a fun play session in the snow!',
        'The large and rough-coated Otterhound was originally bred for hunting otter in England. Built for work, the dog breed has a keen nose and renowned stamina.

This is an uncommon breed, with fewer than ten litters born each year in the United States and Canada. Still some may still end up in the care of shelters or rescues. Consider adoption if this is the breed for you.

Otterhounds are also playful clowns, friendly and affectionate with their families. They even love kids and other dogs, and they crave playtime and plenty of exercise to burn off their high energy. In fact, apartment dwellers will find it very difficult to provide enough space for them to run and move. But those who have room to roam and love to give will be rewarded with a loving companion who will never fail to delight their humans with silly antics and fun.',
        'The Pug is often described as a lot of dog in a small space. These sturdy, compact dogs are a part of the American Kennel Club’s Toy group, and are known as the clowns of the canine world because they have a great sense of humor and like to show off.

Even though these are purebred dogs, you may find them in the care of shelters or rescue groups. Remember to adopt! Don’t shop if you want to bring a dog home.

Originally bred to be lap dogs, Pugs thrive on human companionship. They’re highly sensitive, and though they can make for great apartment pets, they will not appreciate being left home alone for long hours of the day. Although these pups have a stubborn side, especially when it comes to house training, they’re playful, affectionate dogs who will get along well even with novice pet parents. If you’re looking for a loving, easygoing pal, this may be the breed for you!',
        'The Rottador is a mixed breed dog–a cross between the Rottweiler and Labrador Retriever dog breeds. Large, energetic, and loyal, these pups inherited some of the best qualities from both of their parents.

The Rottador is also called the Labrottie, Labweiller, Rottwador and Rott ‘n Lab. Despite their unfortunate status as a designer breed, you can find these mixed breed dogs in shelters and breed specific rescues, so remember to adopt! Don’t shop!

Rottadors make a great choice for a variety of owners–house or apartment, single person home or large family. Affectionate and loyal, this dog would quickly become the best friend to almost anyone. These dogs are protective and make awesome watchdogs. Don’t leave them alone for long periods, though, or else they may become bored and destructive.',
       'One of the oldest of dog breeds, Salukis were once considered a gift from Allah. They’re fast as the wind, skinny as a supermodel, and quietly devoted to their people.

Even though these are purebred dogs, some may still end up in the care of shelters or rescues. Consider adoption if this is the breed for you.

A Saluki is easy to groom, challenging to train, and not to be trusted off leash. Not well-suited for apartment life or for being left home alone all day, these dogs need space to roam, preferably in a yard with a high fence, as they have a high prey drive and will wander if allowed. They’d also fair better with an experienced pet parent who can stay firm and consistent with training while providing them with the exercise they need. Give your Saluki the love and care they crave, and you’ll have a loyal, lifelong companion.',
       'The Terripoo is a cross between the Australian Terrier and the miniature Poodle. Intelligent, intuitive, and playful, these small dogs make excellent family pets.

Terripoos are also known as Terri Poos, Terridoodles, and Terrypoos. They are considered “designer dogs,” bred on purpose to emphasize desirable characteristics from each breed. As always, please adopt if you’re looking to add a Terripoo to your life. In addition to shelters, these dogs can be found at Terrier and Poodle breed specific rescues. Remember, when you adopt, you save two lives: the one you bring home and the one you make room for at the rescue.

These dogs are quite versatile and can do well with young children and even other animals, but supervised introductions are necessary, especially due to their Terrier ancestry–and because of that same ancestry, you may want to stay away from mixing small animals, like rodents, into the group. Wanting to be part of all family activity, Terripoos do best when they get sufficient attention. But with their small size, they don’t need a lot of space. If you’re looking for a loving little dog who can read your moods and alert you when danger is near or something is amiss, a Terripoo might be for you!',
        'Created in Hungary to work as a pointer and retriever, the Vizsla dog breed has an aristocratic bearing. All they really want, though, is to be loved.

Although they’re purebred dogs, you may find Vizslas in shelters or in the care of rescue groups. If this is the breed for you, opt to adopt if possible!

Vizslas make super companions for active families who can provide them with the exercise and attention they crave. Although these dogs are quite affectionate, they don’t take to apartment living easily. They’d much prefer a large yard to run around and burn off their energy.',
        'The Whippet dog breed was a hunter’s best friend, speedily going after rabbits and other small game. Today the breed competes in agility, flyball, lure coursing, rally, and obedience and is a loving therapy dog.

Even though these are purebred dogs, some may still end up in the care of shelters or rescues. Consider adoption if this is the breed for you.

This breed’s unique nature, friendly personality, and stylish look make them a favorite as a family companion, as well as in the show ring. They can even make great apartment pets; although, they require plenty of exercise to burn off their high energy, and they also don’t enjoy being left home alone for long hours of the day. You may not get a great watchdog with a Whippet, as they rarely bark, even at strangers. But you will get a highly affectionate companion for the whole family.',
        'The Xoloitzcuintli dog breed — sometimes called the Mexican Hairless or just Xolo — may well have descended from the first dogs to set paw on the North American continent.

Although these purebred dogs are fairly rare, you may find them in shelters and rescues. Remember to adopt! Don’t shop if you want to bring one of these dogs home.

In their native Mexico and Central America, they were popular “doctors” — the heat given off by their bodies providing comfort to people with arthritis and other ailments. People still like to cuddle with them today!',
        'Small in size but big in personality, the Yorkshire Terrier makes a feisty but loving companion. The most popular toy dog breed in the United States, the “Yorkie” has won many fans with their devotion to their owners, their elegant looks, and their suitability to apartment living.

Even though these are purebred dogs, you may find them in the care of shelters or rescue groups. Remember to adopt! Don’t shop if you want to bring a dog home.

Although Yorkies can make for great apartment pets, they also have a tendency to be yappy, which neighbors may not appreciate. They’ll need a bit of maintenance too, especially when it comes to dental care. While these pups are playful, they’re also small and can be injured by children. But if you can provide lots of love, attention, care, and playtime, you’ll have a loving, adorable companion who’ll stick to you like your shadow!'];

    private $owner_id = ['/api/users/1', '/api/users/2',
        '/api/users/1', '/api/users/2', '/api/users/1',
        '/api/users/1', '/api/users/2', '/api/users/1',
        '/api/users/1', '/api/users/2', '/api/users/1',
        '/api/users/1', '/api/users/2', '/api/users/1',
        '/api/users/1', '/api/users/2', '/api/users/1',
        '/api/users/1', '/api/users/2', '/api/users/1',
        '/api/users/1', '/api/users/2', '/api/users/1'];

    public function load(ObjectManager $manager)
    {
        $user1 = $manager->getRepository(User::class)->findOneBy(['id' => '1']);
        $user2 = $manager->getRepository(User::class)->findOneBy(['id' => '2']);
        $j = 1;
        for ($i = 0 ; $i < count($this->breedList) ; $i++) {
            $dog = new Dog();
            $dog->setBreed($this->breedList[$i]);
            $dog->setImage($this->images[$i]);
            $dog->setDescription($this->descriptions[$i]);
            if ($j / 2 == 0) {
                $dog->setOwner($user1);
            } else {
                $dog->setOwner($user2);
            }
            $j++;
            $manager->persist($dog);
        }
        $manager->flush();
    }
}
