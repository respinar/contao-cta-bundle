<?php

declare(strict_types=1);

namespace Respinar\ContaoCtaBundle\Controller\FrontendModule;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsFrontendModule;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Contao\ModuleModel;
use Contao\PageModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsFrontendModule(category: "miscellaneous", type: "calltoaction")]
class CtaController extends AbstractFrontendModuleController
{
    protected function getResponse(FragmentTemplate $template, ModuleModel $model, Request $request): Response
    {
        // Check if the current page has CTA fields set
        $page = $this->getPageModel();

        // Get the root page
        $rootPage = PageModel::findById($page->rootId);
        if ($rootPage === null) {
            // Log an error or handle gracefully; for now, assume CTA is disabled
            return new Response();
        }

        if ($page->ctaDisabled ?? $rootPage->ctaDisabled ?? false) {
            return new Response();
        }

        // Assign data to the template
        $template->set('ctaTitle', $page->ctaTitle ?: $rootPage->ctaTitle ?: $model->ctaTitle);
        $template->set('ctaUrl', $page->ctaUrl ?: $rootPage->ctaUrl ?: $model->ctaUrl);
        $template->set('ctaText', $page->ctaText ?: $rootPage->ctaText ?: $model->ctaText);

        $template->set('searchable', False);
        
        return $template->getResponse();
    }

    private function isCtaVisible(PageModel $page, ModuleModel $model): bool
    {

        while ($page !== null) {
            $visibility = $page->ctaVisibility;

            if ($visibility !== 'default') {                
                return $visibility === 'show';
            }

            $page = PageModel::findById($page->pid);
        }      

        return $model->ctaIsVisible; // default fallback = enabled
    }
}