# Contributing

## Workflow
![flow](https://bosnadev.com/wp-content/uploads/2016/08/git_workflow.png)

O fluxo do projeto, é o mesmo fluxo usado pelo [gitflow] para amenizar a quantidade de conflitos ao decorrer do processo de contribuição. Logo para que seja possível contribuir com o projeto, **é necessário instalar o [gitflow]**.

Os valores padrão para este projeto são:

- **Produção: ** *master*
- **Desenvolvimento: ** *develop*
- **Feature: ** *feature/*
- **Release: ** *release/*
- **Hotfix: ** *hotfix/*
- **Bugfix: ** *bugfix/*
- **Suporte: ** *support/*
- **Prefixo das versões: ** *v*

[Guia rápido de como usar o gitflow](https://danielkummer.github.io/git-flow-cheatsheet/index.pt_BR.html)
[Guia avançado do fluxo](http://nvie.com/posts/a-successful-git-branching-model/)

## Pull Request Process
1. Faça um fork do projeto original
2. Inicie o [gitflow]: `$ gitflow init`.
3. Instale as dependências via [Composer](https://getcomposer.org/): `$ sudo composer update`.
4. Inicie uma nova *feature* utilizando o [gitflow]: `$ gitflow feature start <nome_da_feature>`.
5. Publique o branch criado para a *feature*: `$ gitflow feature publish <nome_da_feature>`.
6. Faça as alterações e não esqueça de fazer os commits. **É muito importante criar uma descrição detalhada em cada commit!**
7. Finalize a *feature* após todas as alterações: `$ gitflow feature finish <nome_da_feature>`.
8. Crie um ***[Pull Request](https://github.com/snddigitall/bf-toolkit/pull/new/master)*** no projeto original.
8. Ah. Não se esqueça de sempre publicar as alterações feitas na *branch da feature*!

## Issues and labels
Nosso rastreador de bugs usa vários rótulos para ajudar a organizar e identificar problemas. Aqui estão alguns deles, o que eles representam e como os usa-los:

- `hotfix` - São erros que são reportados e que estão em versão de produção. Esses devem ser corrigidos o mais rápido possível e criados uma versão de correção usando o [gitflow]: `$ git flow hotfix start 1.0.x`. (Lembrando que o projeto é mantido de acordo com as diretrizes do [Semantic Versioning Guidelines]. Tente aderir a essas regras sempre que possível.)
Ao finalizar a correção, utilize o comando [gitflow] para filanizar o *hotfix*: `$ git flow hotfix finish 1.0.x`
- `bugfix` - Erros que firam identificados antes da versão/funcionalidade ir para produção ou erros que não "atrapalhem" de forma significativa o que já está em produção. Nesse caso o fluxo de correção é parecido com o do _hotfix_, porém deve-se utilizar o bugfix do [gitflow].
- `feature` - Solicitação para que um novo recurso seja adicionado ou um existente, para ser estendido ou modificado.

Para uma visão geral dobre as labels do projeto, veja a [página das labels do projeto](https://github.com/BackFront/backfront-package/labels).

## Feature requests
Os pedidos de recursos são bem-vindos, mas antes de abrir solicitação de uma nova Feature, por favor, tome um momento para descobrir se sua idéia 
cabe ao alcance e aos objetivos do projeto.

Por favor forneça o máximo de detalhes possível para que os Desenvolvedores possam implementar a ideia.

[Semantic Versioning Guidelines]:https://semver.org/lang/pt-BR/
[gitflow]:https://github.com/danielkummer/git-flow-cheatsheet