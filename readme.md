## 123cat.net

### Maintaining framework

As described in http://viget.com/extend/keeping-the-framework-for-your-application-up-to-date-with-git

#### Commit + push

    git add .
    git commit -m "Commit message"
    git push origin master

#### Update framework

    git checkout framework
    git pull laravel master
    git checkout master
    git merge framework
