# elephantesque

Site [Kirby CMS](https://getkirby.com) hébergé chez Gandi (Simple Hosting).

Ce dépôt est la source de vérité du **code** du site. Le **contenu éditorial** (`content/`) et les médias (`media/`, `thumbs/`) restent gérés depuis le Panel Kirby en prod — ils ne sont donc pas suivis par git.

## Stack

- Kirby CMS **5.3.2** (basé sur le Starterkit)
- PHP **8.2 → 8.5** (cf. `composer.json`)
- Hébergement : Gandi Simple Hosting
- `kirby/` est vendored à la racine (comportement par défaut du Starterkit, pas de `vendor/`)

## Arborescence suivie par git

Sont **commités** : `index.php`, `.htaccess`, `assets/`, `site/` (sauf sous-dossiers d'état listés plus bas), `kirby/` et tout autre fichier de configuration / code.

Sont **exclus** (voir `.gitignore`) :

- `content/` — contenu éditorial (géré via Panel en prod)
- `media/`, `thumbs/` — médias et thumbnails générés
- `site/accounts/` — comptes Panel (contient des hashes de mots de passe)
- `site/sessions/`, `site/cache/`, `site/logs/` — état d'exécution
- `vendor/`, `node_modules/` — dépendances
- `.env*` — secrets et variables d'environnement

## Développement local

```bash
git clone https://github.com/jbpuig44/elephantesque-Kirby.git
cd elephantesque-Kirby
# servir via PHP built-in (rapide pour bricoler)
php -S localhost:8000
```

Pour obtenir un vrai jeu de données local, il faut récupérer `content/` et éventuellement `site/accounts/` depuis la prod via SFTP — ces dossiers ne sont volontairement pas dans le repo.

## Déploiement — GitHub Actions → Gandi

Le workflow `.github/workflows/deploy.yml` déploie automatiquement vers Gandi :

- **Déclencheurs** : push sur `main` ou lancement manuel (`workflow_dispatch`)
- **Méthode** : `lftp mirror -R` sur SFTP port 22
- **Exclusions** : tout ce qui est exclu de git + `.github/`, `README.md`, `.editorconfig`

### Secrets GitHub à configurer

Settings → Secrets and variables → Actions → New repository secret :

| Secret | Description |
|---|---|
| `GANDI_SFTP_HOST` | Host SFTP Gandi (ex : `sftp.dc0.gpaas.net`) |
| `GANDI_SFTP_USER` | Identifiant de l'instance Simple Hosting |
| `GANDI_SFTP_PASSWORD` | Mot de passe SFTP de l'instance |
| `GANDI_REMOTE_PATH` | Chemin absolu du webroot (ex : `/lamp0/web/vhosts/default/htdocs`) |

### Premier déploiement

1. Configurer les 4 secrets ci-dessus.
2. Déclencher le workflow manuellement depuis l'onglet *Actions* (`Deploy to Gandi` → `Run workflow`) **avant** de merger sur `main`, pour valider la config sans risque.
3. Vérifier les logs lftp dans l'exécution du job.
4. Smoke-test le site en prod.

Le mirror est volontairement **sans `--delete`** pour ne jamais effacer de fichiers distants tant que le cycle n'est pas validé. On pourra l'ajouter une fois le workflow éprouvé.
