@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ Lang::get('site.devops') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<h4>{{{ Lang::get('site.devops') }}}</h4>
<div class="row">
  	<div class="col-md-12">
  		<h4>Devops Readiness Package</h4>
  		<p>
		Our comprehensive assessment provides reviews of your infrastructure across six key areas to identify areas for improvement.
		<ul>
			<li>Performance</li>
			<li>Workflows</li>
			<li>Costs</li>
			<li>Robustness & Disaster Recovery</li>
			<li>Security scan and vulnerabilities</li>
			<li>Monitoring</li>
		</ul>
		</p>
		<p>Call us today on (800) 813-1315 or <a href="mailto:xdockersupport@xervmon.com">email us </a> with your questions in relation to our assessment packages and how a review can help your security and cost savings. </p>
		
	</div>
	
	<div class="col-md-12">
  		<h4>Docker Assessment Package</h4>
  		<strong>Is Docker Right For Your Business Needs?</strong>
		<p>
		‘Docker’ is getting a lot of interest from enterprises and small businesses looking to improve their cloud service management. This container-based virtualization approach builds on Linux Container technology to facilitate enhanced application portability across platforms. 
		</p>
		<p>
			Docker containers are also lightweight, which means that unlike virtual machines, they do not have to run on an underlying operating system.
			Our use of the Docker systems presents opportunities for our clients to operate more efficiently.  However, many businesses are still not fully aware of how or when to use it. We have experience in implementing Docker, in testing and benchmarking.  We understand the best applications for Docker, and it’s limits for offering cloud IT solutions.
		</p>
		<p>
			We can demonstrate the benefits in terms of developer workflows to improve testing in the local dev environment, reduce the time needed to maintain that environment, and ease tasks, such as re-creating and sharing that environment.
			To find out more about how Docker can support your development team, call us today on (800) 813-1315 or <a href="mailto:xdockersupport@xervmon.com">email us </a> with your questions in relation to our assessment packages and how a review can help your security and cost savings. 
		</p>
		
	</div>
	
	


</div>
@stop






